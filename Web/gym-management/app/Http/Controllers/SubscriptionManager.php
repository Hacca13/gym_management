<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google\Cloud\Firestore\FirestoreClient;
use Firevel\Firestore\Facades\Firestore;
use App\Http\Models\SubscriptionModels\SubscriptionModel;
use App\Http\Models\SubscriptionModels\SubscriptionCourseModel;
use App\Http\Models\SubscriptionModels\SubscriptionPeriodModel;
use App\Http\Models\SubscriptionModels\SubscriptionRevenueModel;
use Illuminate\Pagination\LengthAwarePaginator;

class SubscriptionManager extends Controller
{


    public static function subscriptionsThatExpireSoon(){
      $listSubscription = array();
      $today = date("Y-m-d");
      $todayPlus5Day = strtotime ( '+5 day' , strtotime ( $today ) ) ;
      $todayPlus5Day = date ( 'Y-m-d' , $todayPlus5Day );

      $subscriptions = SubscriptionManager::getAllSubscription();

      foreach ($subscriptions as $subscription) {
        if($subscription->getIsActive() == TRUE){
            if($subscription instanceof SubscriptionPeriodModel){
              $timestamp = strtotime($subscription->getEndDate());
              $endDate = date("Y-m-d", $timestamp);
              if($today >= $endDate && $endDate <= $todayPlus5Day){
                $user = UsersManager::getUserById($subscription->getIdUserDatabase());
                $userNameAndSurname = $user->getName().' '.$user->getSurname();
                $userNameAndSubscription = array(
                    'userNameAndSurname' => $userNameAndSurname,
                    'subscription' => $subscription);

                array_push($listSubscription,$userNameAndSubscription);
              }
            }
            elseif ($subscription instanceof SubscriptionRevenueModel) {
              if(($subscription->getNumberOfEntriesMade()+3) >= $subscription->getNumberOfEntries() ){
                $user = UsersManager::getUserById($subscription->getIdUserDatabase());
                $userNameAndSurname = $user->getName().' '.$user->getSurname();
                $userNameAndSubscription = array(
                    'userNameAndSurname' => $userNameAndSurname,
                    'subscription' => $subscription);

                array_push($listSubscription,$userNameAndSubscription);
              }
            }
            else{
              $timestamp = strtotime($subscription->getEndDate());
              $endDate = date("Y-m-d", $timestamp);
              if($today >= $endDate && $endDate <= $todayPlus5Day){
                $user = UsersManager::getUserById($subscription->getIdUserDatabase());
                $userNameAndSurname = $user->getName().' '.$user->getSurname();
                $userNameAndSubscription = array(
                    'userNameAndSurname' => $userNameAndSurname,
                    'subscription' => $subscription);

                array_push($listSubscription,$userNameAndSubscription);
              }
            }
        }
      }





      return $listSubscription;
    }


    public static function searchSubscription(Request $request){
      $currentPage = LengthAwarePaginator::resolveCurrentPage();
      $input = $request->all();

     if(isset($input['searchInput'])){
          $input = strtolower($input['searchInput']);
          $request->session()->put('searchInput', $input);
      }else{
          $input = $request->session()->pull('searchInput');
          $request->session()->put('searchInput', $input);
      }

      $url = substr($request->url(), 0, strlen($request->url())-29);
      $url = $url.'/admin/subscriptionPageSearchResults';

      $userForSubscriptionPage = UsersManager::getUserDBOrUserSessionForSearchPage($request,$currentPage,$input);
      $subscriptionResultList = array();

      $subscriptionlistTemp= $request->session()->pull('allSubscription');
      $request->session()->put('allSubscription', $subscriptionlistTemp);

      foreach ($userForSubscriptionPage as $user) {
        foreach ($subscriptionlistTemp as $subscription) {
          if($user->getIdDatabase() == $subscription->getIdUserDatabase()){
            array_push($subscriptionResultList,$subscription);
          }
        }
      }

      $itemCollection = collect($subscriptionResultList);
      $perPage = 6;
      $currentPageItems = $itemCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
      $subscriptionResultList= new LengthAwarePaginator($currentPageItems , count($itemCollection), $perPage);
      $subscriptionResultList->setPath($url);



      return view('subscriptionPageSearchResult', compact('subscriptionResultList','userForSubscriptionPage'));

    }





    public static function getAllSubscriptionForView(Request $request){
      $currentPage = LengthAwarePaginator::resolveCurrentPage();
      $subscriptionList = SubscriptionManager::getSubscriptionDBOrSubscriptionSession($request,$currentPage);
      $itemCollection = collect($subscriptionList);
      $perPage = 6;
      $currentPageItems = $itemCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
      $subscriptionList= new LengthAwarePaginator($currentPageItems , count($itemCollection), $perPage);
      $subscriptionList->setPath($request->url());

      $userForSubscriptionPage = $request->session()->pull('userForSubscriptionPage');
      $request->session()->put('userForSubscriptionPage', $userForSubscriptionPage);

      return view('subscriptionPage', compact('subscriptionList','userForSubscriptionPage'));
    }

    public static function getSubscriptionDBOrSubscriptionSession(Request $request,$currentPage){
      if($currentPage == 1){
        $documents = SubscriptionManager::getAllSubscription();
        $request->session()->put('allSubscription', $documents);
        $userForSubscriptionPage = array();

        foreach ($documents as $document) {
          $user = UsersManager::getUserById($document->getIdUserDatabase());
          array_push($userForSubscriptionPage, $user);
        }

        $request->session()->put('userForSubscriptionPage', $userForSubscriptionPage);
      }
      else{
        $documents = $request->session()->pull('allSubscription');
        $request->session()->put('allSubscription', $documents);
      }
      return $documents;
    }

    public static function getAllSubscription(){
        $allSubscriptions = array();
        $collection = Firestore::collection('Subscriptions');
        $documents = $collection->documents();

        foreach ($documents as $document) {
            $subscription = SubscriptionManager::trasformArraySubscriptionToSubscription($document->data());
            $subscription->setIdDatabase($document->id());

            if($subscription instanceof SubscriptionRevenueModel){
                if($subscription->getNumberOfEntries() <= $subscription->getNumberOfEntriesMade() ){
                    $subscription->setIsActive(false);
                    $subscriptionSet = SubscriptionManager::trasformSubscriptionToArraySubscription($subscription);
                    unset($subscriptionSet['idDatabase']);
                    $collection->document($subscription->getIdDatabase())->set($subscriptionSet);
                }
            }
            elseif ($subscription instanceof SubscriptionCourseModel) {
              $endDate = $subscription->getEndDate();
              if(SubscriptionManager::isExpired($endDate)){
                  $subscription->setIsActive(false);
                  CoursesManager::removeUserToCourse($subscription->getIdCourseDatabase(),$subscription->getIdUserDatabase());
                  $subscriptionSet = SubscriptionManager::trasformSubscriptionToArraySubscription($subscription);
                  unset($subscriptionSet['idDatabase']);
                  $collection->document($subscription->getIdDatabase())->set($subscriptionSet);
              }
            }
            else {
              $endDate = $subscription->getEndDate();
              if(SubscriptionManager::isExpired($endDate)){
                  $subscription->setIsActive(false);
                  $subscriptionSet = SubscriptionManager::trasformSubscriptionToArraySubscription($subscription);
                  unset($subscriptionSet['idDatabase']);
                  $collection->document($subscription->getIdDatabase())->set($subscriptionSet);
              }
            }


            array_push($allSubscriptions,$subscription);
        }
        return $allSubscriptions;
    }

    public static function isExpired($endDate){
      $today = date("Y-m-d");
      $timestamp = strtotime($endDate);
      $endDate = date("Y-m-d", $timestamp);

      if($endDate > $today){
        return true;
      }
      else{
        return false;
      }
    }

    public static function getSubscriptionByUser($idUserDatabase){
        $allSubscriptions = array();
        $collection = Firestore::collection('Subscriptions');
        $query = $collection->where('idUserDatabase','=',$idUserDatabase);
        $documents = $query->documents();
        foreach ($documents as $document) {
            $subscription = SubscriptionManager::trasformArraySubscriptionToSubscription($document->data());
            $subscription->setIdDatabase($document->id());
            array_push($allSubscriptions,$subscription);
        }
        return $allSubscriptions;
    }


    public static function trasformArraySubscriptionToSubscription($arraySubscription){
        $idDatabase = data_get($arraySubscription,'idDatabase');
        $idUserDatabase = data_get($arraySubscription,'idUserDatabase');
        $isActive = data_get($arraySubscription,'isActive');
        $type = data_get($arraySubscription,'type');

        if($type == 'course'){
            $idCourseDatabase = data_get($arraySubscription,'idCourseDatabase');
            $startDate = data_get($arraySubscription,'startDate');
            $endDate = data_get($arraySubscription,'endDate');

            $subscription = new SubscriptionCourseModel($idDatabase,$idUserDatabase,$isActive,$type,$idCourseDatabase,$startDate,$endDate);
        }
        elseif($type == 'period'){
            $startDate = data_get($arraySubscription,'startDate');
            $endDate = data_get($arraySubscription,'endDate');

            $subscription = new SubscriptionPeriodModel($idDatabase,$idUserDatabase,$isActive,$type,$startDate,$endDate);
        }
        else{
            $numberOfEntries =  data_get($arraySubscription,'numberOfEntries');
            $numberOfEntriesMade =  data_get($arraySubscription,'numberOfEntriesMade');

            $subscription = new SubscriptionRevenueModel($idDatabase,$idUserDatabase,$isActive,$type,$numberOfEntries,$numberOfEntriesMade);
        }

        return $subscription;
    }

    public static function trasformSubscriptionToArraySubscription($subscription){

        if($subscription->getType() == 'course'){
            $arraySubscription = array(
                'idDatabase' => $subscription->getIdDatabase(),
                'idUserDatabase' => $subscription->getIdUserDatabase(),
                'isActive' => $subscription->getIsActive(),
                'type' => $subscription->getType(),
                'idCourseDatabase' => $subscription->getIdCourseDatabase(),
                'startDate' => $subscription->getStartDate(),
                'endDate' => $subscription->getEndDate()
            );
        }
        elseif($subscription->getType() == 'period'){
            $arraySubscription = array(
                'idDatabase' => $subscription->getIdDatabase(),
                'idUserDatabase' => $subscription->getIdUserDatabase(),
                'isActive' => $subscription->getIsActive(),
                'type' => $subscription->getType(),
                'startDate' => $subscription->getStartDate(),
                'endDate' => $subscription->getEndDate()
            );
        }
        else{
            $arraySubscription = array(
                'idDatabase' => $subscription->getIdDatabase(),
                'idUserDatabase' => $subscription->getIdUserDatabase(),
                'isActive' => $subscription->getIsActive(),
                'type' => $subscription->getType(),
                'numberOfEntries' => $subscription->getNumberOfEntries(),
                'numberOfEntriesMade' => $subscription->getNumberOfEntriesMade()
            );
        }

        return $arraySubscription;
    }

    public static function getAllUser(){

        $allUser = array();

          $collection = Firestore::collection('Users');
          $documents = $collection->documents();
          foreach ($documents as $document) {
              $user = UsersManager::transformArrayUserIntoUser($document->data());
              $user->setIdDatabase($document->id());
              array_push($allUser,$user);
          }


        return view('subscriptionPage', compact('allUser'));
    }

    public static function addSubscription() {
        $users = UsersManager::getAllUser();
        return view('insertSubscription', compact('users'));
    }

    public function insertSubscription(Request $request) {
        $collection = Firestore::collection('Subscriptions');
        $input = $request->all();

        if($input['type'] == 'course'){
          CoursesManager::addUserToCourse($input['idCourseDatabase'],$input['idUserDatabase']);
        }

        $collection->add($input);
        toastr()->success('Abbonamento creato con successo');
        return '/gestioneAbbonamenti';
    }


}
