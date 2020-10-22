<?php

namespace App\Http\Controllers;

use ChromePhp;
use FontLib\Table\Type\name;
use Illuminate\Http\Request;
use Google\Cloud\Firestore\FirestoreClient;
use Firevel\Firestore\Facades\Firestore;
use App\Http\Models\SubscriptionModels\SubscriptionModel;
use App\Http\Models\SubscriptionModels\SubscriptionCourseModel;
use App\Http\Models\SubscriptionModels\SubscriptionPeriodModel;
use App\Http\Models\SubscriptionModels\SubscriptionRevenueModel;
use Illuminate\Pagination\LengthAwarePaginator;
use Carbon\Carbon;


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
                    if($today <= $endDate && $endDate <= $todayPlus5Day){
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
                    if($today <= $endDate && $endDate <= $todayPlus5Day){
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
        $perPage = 12;
        $currentPageItems = $itemCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
        $subscriptionResultList= new LengthAwarePaginator($currentPageItems , count($itemCollection), $perPage);
        $subscriptionResultList->setPath($url);



        return view('subscriptionPageSearchResult', compact('subscriptionResultList','userForSubscriptionPage'));

    }





    public static function getAllSubscriptionForView(Request $request){
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $subscriptionList = SubscriptionManager::getSubscriptionDBOrSubscriptionSession($request,$currentPage);
        $itemCollection = collect($subscriptionList);
        $perPage = 12;
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
        $allSubscriptionsActive = array();
        $allSubscriptionsActiveRevenue = array();
        $allSubscriptionsActiveCourse = array();
        $allSubscriptionsActivePeriod = array();
        $allSubscriptionsDisactive = array();
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
                else {
                  $subscription->setIsActive(true);
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
                else {
                  $subscription->setIsActive(true);
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
                else {
                  $subscription->setIsActive(true);
                  $subscriptionSet = SubscriptionManager::trasformSubscriptionToArraySubscription($subscription);
                  unset($subscriptionSet['idDatabase']);
                  $collection->document($subscription->getIdDatabase())->set($subscriptionSet);
                }
            }

            if(!$subscription->getIsActive()){
              array_push($allSubscriptionsDisactive,$subscription);
            }
            else{
              if($subscription instanceof SubscriptionRevenueModel){
                array_push($allSubscriptionsActiveRevenue,$subscription);
              }
              elseif ($subscription instanceof SubscriptionCourseModel) {
                array_push($allSubscriptionsActiveCourse,$subscription);
              }
              elseif ($subscription instanceof SubscriptionPeriodModel){
                array_push($allSubscriptionsActivePeriod,$subscription);
              }
            }


        }


        $allTrainingCardsActive = SubscriptionManager::mergeAndSortAllSubscriptionsActive($allSubscriptionsActivePeriod,$allSubscriptionsActiveCourse,$allSubscriptionsActiveRevenue);


        $allSubscriptions = array_merge($allTrainingCardsActive, $allSubscriptionsDisactive);
        return $allSubscriptions;
    }

    public static function mergeAndSortAllSubscriptionsActive($allSubscriptionsActivePeriod,$allSubscriptionsActiveCourse,$allSubscriptionsActiveRevenue){
      $allTrainingCardsActive = array();

      usort($allSubscriptionsActivePeriod, function($a, $b){

          $endDateA = $a->getEndDate();
          $parsedDateA = str_replace("/", "-", $endDateA);
          $endDateB = $b->getEndDate();
          $parsedDateB = str_replace("/", "-", $endDateB);

          $dateA = Carbon::parse($parsedDateA);
          $dateB = Carbon::parse($parsedDateB);


          if($dateB->lessThan($dateA)){
            return 1;
          }
          elseif ($dateA === $dateB) {
            return 0;
          }
          else{
            return -1;
          }

      });

      usort($allSubscriptionsActiveCourse, function($a, $b){

          $endDateA = $a->getEndDate();
          $parsedDateA = str_replace("/", "-", $endDateA);
          $endDateB = $b->getEndDate();
          $parsedDateB = str_replace("/", "-", $endDateB);

          $dateA = Carbon::parse($parsedDateA);
          $dateB = Carbon::parse($parsedDateB);


          if($dateB->lessThan($dateA)){
            return 1;
          }
          elseif ($dateA === $dateB) {
            return 0;
          }
          else{
            return -1;
          }

      });

      usort($allSubscriptionsActiveRevenue, function($a, $b){

          $numberOfEntriesLeftA = $a->getNumberOfEntries() - $a->getNumberOfEntriesMade();
          $numberOfEntriesLeftB = $b->getNumberOfEntries() - $b->getNumberOfEntriesMade();


          if($numberOfEntriesLeftA > $numberOfEntriesLeftB){
            return 1;
          }
          elseif ($numberOfEntriesLeftA === $numberOfEntriesLeftB) {
            return 0;
          }
          else{
            return -1;
          }

      });

      $allSubscriptionsActive = array_merge($allSubscriptionsActivePeriod,$allSubscriptionsActiveCourse);
      $allSubscriptionsActive = array_merge($allSubscriptionsActive,$allSubscriptionsActiveRevenue);

      return $allSubscriptionsActive;
    }



    public static function isExpired($endDate){
        $parsedDate = str_replace("/", "-", $endDate);
        $today = Carbon::now()->add(-1, 'day');
        $dateTocheck = Carbon::parse($parsedDate);
        if($today->lessThan($dateTocheck)){
            return false;
        }
        else{
            return true;
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

        if ($input['type'] == 'course') {
            $this::addUserToCourseSubs($input['idCourseDatabase'], $input['idUserDatabase']);
        }

        UsersManager::activeUser($input['idUserDatabase']);

        $collection->add($input);
        return '/admin/gestioneAbbonamenti';
    }

    public function addUserToCourseSubs($courses, $userID) {
        foreach ($courses as $course) {
            $id = $course;
            $fireCourse = CoursesManager::getCourseByID($course);
            $userList = $fireCourse->getUsersList();
            array_push($userList, $userID);
            $corso = array(
                'idDatabase' => $fireCourse->getIdDatabase(),
                'name' => $fireCourse->getName(),
                'image' => $fireCourse->getImage(),
                'imageName' => $fireCourse->getImageName(),
                'isActive' => $fireCourse->getIsActive(),
                'instructor' => $fireCourse->getInstructor(),
                'period' => $fireCourse->getPeriod(),
                'weeklyFrequency' => $fireCourse->getWeeklyFrequency(),
                'usersList' => $userList
            );
            $collection = Firestore::collection('Courses')->document($id);
            $collection->set($corso);
            }
    }

    public function updateSubsView($id) {
        return view('updateSubscription');
    }

    public function retrieveSubsData($id) {
        $subs = Firestore::collection('Subscriptions')->document($id)->snapshot()->data();
        $courseName = [];
        if($subs['type'] == 'course') {
            foreach ($subs['idCourseDatabase'] as $corsoid) {
                $fbCrs = Firestore::collection('Courses')->document($corsoid)->snapshot()->data();
                array_push($courseName, $fbCrs['name']);
            }
        }
        $user = Firestore::collection('Users')->document($subs['idUserDatabase'])->snapshot()->data();
        return response()->json([$subs, $user, $subs['idUserDatabase'], $id, $courseName]);
    }

    public function updateSubsData(Request $request, $id) {
        $input = $request->all();
        $collection = Firestore::collection('Subscriptions')->document($id);
        $fireSub = Firestore::collection('Subscriptions')->document($id)->snapshot();

        if ($input['type'] == 'course') {
            $coursesList = $fireSub['idCourseDatabase'];
            array_push($coursesList, last($input['idCourseDatabase']));
            $newSub= array(
                'endDate' => $input['endDate'],
                'startDate' => $input['startDate'],
                'idCourseDatabase' => $coursesList,
                'idUserDatabase' => $input['idUserDatabase'],
                'isActive' => $input['isActive'],
                'type' => $input['type']
            );
            $this::addUserToCourseSubs($coursesList, $input['idUserDatabase']);
        } else {
            $newSub = $input;
        }

        //var_dump($newSub);
        $collection->set($newSub);
        return '/admin/gestioneAbbonamenti';
    }


    public function decrementEntrances($id) {
        $subs = Firestore::collection('Subscriptions')->document($id)->snapshot()->data();
        $corso = array(
            'idUserDatabase' => $subs['idUserDatabase'],
            'isActive' => $subs['isActive'],
            'numberOfEntries' => $subs['numberOfEntries'],
            'numberOfEntriesMade' => $subs['numberOfEntriesMade'] -= 1,
            'type' => $subs['type']
        );
        $toUp = Firestore::collection('Subscriptions')->document($id);
        $toUp->set($corso);
        return back();
    }

    public function incrementEntrances($id) {
        $subs = Firestore::collection('Subscriptions')->document($id)->snapshot()->data();
        $corso = array(
            'idUserDatabase' => $subs['idUserDatabase'],
            'isActive' => $subs['isActive'],
            'numberOfEntries' => $subs['numberOfEntries'],
            'numberOfEntriesMade' => $subs['numberOfEntriesMade'] += 1,
            'type' => $subs['type']
        );
        $toUp = Firestore::collection('Subscriptions')->document($id);
        $toUp->set($corso);
        return back();


    }

}
