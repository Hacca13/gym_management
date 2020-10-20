<?php

namespace App\Http\Controllers;

use App\User;
use DateTime;
use Illuminate\Http\Request;
use Kreait\Firebase\Exception\AuthException;
use Kreait\Firebase\Exception\FirebaseException;
use Kreait\Firebase;
use App\Http\Controllers\CoursesManager;
use App\Http\Controllers\MedicalHistoryManager;
use Firevel\Firestore\Facades\Firestore;
use App\Http\Models\UserModels\UserModel;
use App\Http\Models\UserModels\UserUnderageModel;
use Stichoza\GoogleTranslate\GoogleTranslate;
use Illuminate\Pagination\LengthAwarePaginator;
use Carbon\Carbon;

class UsersManager extends Controller{

/*    public static function pulitore(){
      $collection = Firestore::collection('Users');
      $documents = $collection->documents();
      foreach ($documents as $document) {
          $user = UsersManager::transformArrayUserIntoUser($document->data());
          $user->setName(strtolower($user->getName()));
          $user->setSurname(strtolower($user->getSurname()));
          $user->setIdDatabase($document->id());



          $user = UsersManager::transformUserIntoArrayUser($user);
          unset($user['idDatabase']);
          $collection->document($document->id())->set($user);
      }


    }*/


    //this function retorn all User
    public static function getAllUser(){
        $allUser = array();
        $collection = Firestore::collection('Users');
        $documents = $collection->documents();
        foreach ($documents as $document) {
            $user = UsersManager::transformArrayUserIntoUser($document->data());
            $user->setName(ucfirst($user->getName()));
            $user->setSurname(ucfirst($user->getSurname()));
            $user->setIdDatabase($document->id());
            array_push($allUser,$user);

            $allSubscriptionsByUser = SubscriptionManager::getSubscriptionByUser($user->getIdDatabase());
            $flag = true;
            foreach ($allSubscriptionsByUser as $subscription) {
              if($subscription->getIsActive() == TRUE){
                $flag = false;
              }
            }
            if($flag){
                $user->setStatus(false);
                $user = UsersManager::transformUserIntoArrayUser($user);
                unset($user['idDatabase']);
                $collection->document($document->id())->set($user);
            }
        }
        return $allUser;
    }



    public static function searchUsersPartiallyByName($input){
        $usersResultListByName = array();
        $input = strtolower($input);
        $collection = Firestore::collection('Users');
        $documents = $collection->orderBy('name')->startAt([$input])->endAt([$input.'z'])->documents();

        foreach ($documents as $document) {
            $user = UsersManager::transformArrayUserIntoUser($document->data());
            $user->setName(ucfirst($user->getName()));
            $user->setSurname(ucfirst($user->getSurname()));
            $user->setIdDatabase($document->id());
            array_push($usersResultListByName,$user);
        }

        return $usersResultListByName;
    }

    public static function searchUsersPartiallyBySurname($input){
        $usersResultListBySurname = array();
        $input = strtolower($input);
        $collection = Firestore::collection('Users');
        $documents = $collection->orderBy('surname')->startAt([$input])->endAt([$input.'z'])->documents();

        foreach ($documents as $document) {
            $user = UsersManager::transformArrayUserIntoUser($document->data());
            $user->setName(ucfirst($user->getName()));
            $user->setSurname(ucfirst($user->getSurname()));
            $user->setIdDatabase($document->id());
            array_push($usersResultListBySurname,$user);
        }

        return $usersResultListBySurname;
    }

    public static function searchUsersPartially($input){
        $usersResultListByName = UsersManager::searchUsersPartiallyByName($input);
        $usersResultListBySurname = UsersManager::searchUsersPartiallyBySurname($input);
        $usersResultList = $usersResultListByName + $usersResultListBySurname;

        return $usersResultList;
    }


    public static function getUserDBOrUserSessionForSearchByPublicSocialPage($request,$currentPage,$input){
        if($currentPage == 1){
            $usersResultList= array();

            $documents = $request->session()->pull('allUsers');
            $request->session()->put('allUsers', $documents);

            if($input == 'yes'){
              $input = 'true';
            }else {
              $input = 'false';
            }

            foreach ($documents as $document) {
              if($document->getPublicSocial() == $input){
                array_push($usersResultList,$document);
              }
            }

            $request->session()->put('usersResultListByPublicSocial', $usersResultList);
        }
        else{
            $usersResultList = $request->session()->pull('usersResultListByPublicSocial');
            $request->session()->put('usersResultListByPublicSocial', $usersResultList);
        }
        return $usersResultList;
    }

    public static function searchUsersByPublicSocial($input,Request $request){

        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $usersResultList = UsersManager::getUserDBOrUserSessionForSearchByPublicSocialPage($request,$currentPage,$input);
        $coursesForUsers = array();
        $medicalHistoryForUsers = array();

        if($input == 'yes'){
          $url = substr($request->url(), 0, strlen($request->url())-40);
          $url = $url.'/userSearchByPublicSocialResultsPage/'.$input;
        }
        else{
          $url = substr($request->url(), 0, strlen($request->url())-39);
          $url = $url.'/userSearchByPublicSocialResultsPage/'.$input;
        }

        foreach ($usersResultList as $user) {
            $coursesForUser = CoursesManager::theUserForWhichCourseIsRegistered($user->getIdDatabase());
            $medicalHistory = MedicalHistoryManager::getMedicalHistoryByUserId($user->getIdDatabase());

            $coursesForUsers[$user->getIdDatabase()] = $coursesForUser;
            $medicalHistoryForUsers[$user->getIdDatabase()] =$medicalHistory;


        }


        $itemCollection = collect($usersResultList);
        $perPage = 12;
        $currentPageItems = $itemCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
        $usersResultList= new LengthAwarePaginator($currentPageItems , count($itemCollection), $perPage);
        $usersResultList->setPath($url);

        return view('userSearchByPublicSocialResultsPage', compact('usersResultList','coursesForUsers','medicalHistoryForUsers'));
    }



    public static function getUserDBOrUserSessionForSearchByCertificatePage($request,$currentPage,$input){
        if($currentPage == 1){
            $usersResultList = array();

            $documents = $request->session()->pull('allUsers');
            $request->session()->put('allUsers', $documents);

          /*  $date1=mktime(0, 0, 0, date("m")+1, date("d"), date("Y"));
            $afterAMonth = date("Y-m-d",$date1);

            $today =  date("Y-m-d");*/


            $today = Carbon::now();
            $afterAMonth = Carbon::now()->add(1, 'month');


            if($input == '1' || $input == 1 ){
              foreach ($documents as $document) {
                if($document->getMedicalCertificate() !=null ){

                  $parsedDate = str_replace("/", "-", $document->getMedicalCertificate());
                  $medicalCertificate = Carbon::parse($parsedDate)->add(1,'year');

                  if($today->lessThan($medicalCertificate)){
                    array_push($usersResultList,$document);
                  }
                }
              }
            }
            elseif($input == '2' || $input == 2 ) {
              foreach ($documents as $document) {
                if($document->getMedicalCertificate() !=null ){

                  $parsedDate = str_replace("/", "-", $document->getMedicalCertificate());
                  $medicalCertificate = Carbon::parse($parsedDate)->add(1,'year');




                  if($today->greaterThan($medicalCertificate)){
                    array_push($usersResultList,$document);
                  }
                }
                else{
                  array_push($usersResultList,$document);
                }
              }
            }
            else{
              foreach ($documents as $document) {
                if($document->getMedicalCertificate() !=null){
                  $parsedDate = str_replace("/", "-", $document->getMedicalCertificate());
                  $medicalCertificate = Carbon::parse($parsedDate)->add(1,'year');

                  if(($afterAMonth->greaterThan($medicalCertificate)) && ($today->lessThan($medicalCertificate))){
                    array_push($usersResultList,$document);
                  }
                }
              }
            }



            $request->session()->put('usersResultListByCertificate', $usersResultList);
        }
        else{
            $usersResultList = $request->session()->pull('usersResultListByCertificate');
            $request->session()->put('usersResultListByCertificate', $usersResultList);
        }
        return $usersResultList;
    }

    public static function searchUsersByCertificate($input,Request $request){


      $currentPage = LengthAwarePaginator::resolveCurrentPage();
      $usersResultList = UsersManager::getUserDBOrUserSessionForSearchByCertificatePage($request,$currentPage,$input);
      $coursesForUsers = array();
      $medicalHistoryForUsers = array();

      $url = substr($request->url(), 0, strlen($request->url())-37);
      $url = $url.'/userSearchByCertificateResultsPage/'.$input;

      foreach ($usersResultList as $user) {
        $coursesForUser = CoursesManager::theUserForWhichCourseIsRegistered($user->getIdDatabase());
        $medicalHistory = MedicalHistoryManager::getMedicalHistoryByUserId($user->getIdDatabase());

        $coursesForUsers[$user->getIdDatabase()] = $coursesForUser;
        $medicalHistoryForUsers[$user->getIdDatabase()] =$medicalHistory;


      }


      $itemCollection = collect($usersResultList);
      $perPage = 12;
      $currentPageItems = $itemCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
      $usersResultList= new LengthAwarePaginator($currentPageItems , count($itemCollection), $perPage);
      $usersResultList->setPath($url);

      return view('userSearchByCertificateResultsPage', compact('usersResultList','coursesForUsers','medicalHistoryForUsers'));
   }


    public static function searchUsers(Request $request){
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $input = $request->all();


        if(isset($input['searchInput'])){
            $input = strtolower($input['searchInput']);
            $request->session()->put('searchInput', $input);
        }else{
            $input = $request->session()->pull('searchInput');
            $request->session()->put('searchInput', $input);
        }



        $url = substr($request->url(), 0, strlen($request->url())-21);
        $url = $url.'/admin/userPageSearchResults';

        $usersResultList = UsersManager::getUserDBOrUserSessionForSearchPage($request,$currentPage,$input);
        $coursesForUsers = array();
        $medicalHistoryForUsers = array();

        foreach ($usersResultList as $user) {
            $coursesForUser = CoursesManager::theUserForWhichCourseIsRegistered($user->getIdDatabase());
            $medicalHistory = MedicalHistoryManager::getMedicalHistoryByUserId($user->getIdDatabase());

            $coursesForUsers[$user->getIdDatabase()] = $coursesForUser;
            $medicalHistoryForUsers[$user->getIdDatabase()] =$medicalHistory;


        }


        $itemCollection = collect($usersResultList);
        $perPage = 12;
        $currentPageItems = $itemCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
        $usersResultList= new LengthAwarePaginator($currentPageItems , count($itemCollection), $perPage);
        $usersResultList->setPath($url);

        return view('usersPageSearchResult', compact('usersResultList','coursesForUsers','medicalHistoryForUsers'));
    }

    public static function getUserDBOrUserSessionForSearchPage($request,$currentPage,$input){
        if($currentPage == 1){
            $usersResultListByName = UsersManager::searchUsersPartiallyByName($input);
            $usersResultListBySurname = UsersManager::searchUsersPartiallyBySurname($input);
            $usersResultList = $usersResultListByName + $usersResultListBySurname;

            $request->session()->put('usersResultList', $usersResultList);
        }
        else{
            $usersResultList = $request->session()->pull('usersResultList');
            $request->session()->put('usersResultList', $usersResultList);
        }
        return $usersResultList;

    }

    public static function getAllUserForView(Request $request){
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $users = UsersManager::getUserDBOrUserSession($request,$currentPage);
        $coursesForUsers = array();
        $medicalHistoryForUsers = array();
        foreach ($users as $user) {
            $coursesForUser = CoursesManager::theUserForWhichCourseIsRegistered($user->getIdDatabase());
            $medicalHistory = MedicalHistoryManager::getMedicalHistoryByUserId($user->getIdDatabase());

            $coursesForUsers[$user->getIdDatabase()] = $coursesForUser;
            $medicalHistoryForUsers[$user->getIdDatabase()] =$medicalHistory;


        }
        $itemCollection = collect($users);
        $perPage = 12;
        $currentPageItems = $itemCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
        $users= new LengthAwarePaginator($currentPageItems , count($itemCollection), $perPage);
        $users->setPath($request->url());

        return view('usersPage', compact('users','coursesForUsers','medicalHistoryForUsers'));
    }

    public static function getUserDBOrUserSession(Request $request,$currentPage){
        if($currentPage == 1){
            $documents = UsersManager::getAllUser();
            $request->session()->put('allUsers', $documents);

        }
        else{
            $documents = $request->session()->pull('allUsers');
            $request->session()->put('allUsers', $documents);
        }
        return $documents;
    }



    public static function setUser(Request $request){
      $input = $request->all();
      $collection = Firestore::collection('Users');


      $timestamp = strtotime($input['dateOfBirth']);
      $input['dateOfBirth'] = date("d-m-Y", $timestamp);
      $timestamp = strtotime($input['releaseDateDocument']);
      $input['releaseDateDocument'] = date("d-m-Y", $timestamp);


      $input['name'] = strtolower($input['name']);
      $input['surname'] = strtolower($input['surname']);

      if($input['isUnderage']==true){
        $timestamp = strtotime($input['parentDateOfBirth']);
        $input['parentDateOfBirth'] = date("d-m-Y", $timestamp);
        $timestamp = strtotime($input['parentDocumentReleaseDate']);
        $input['parentDocumentReleaseDate'] = date("d-m-Y", $timestamp);
        $input['parentName'] = strtolower($input['parentName']);
        $input['parentSurname'] = strtolower($input['parentSurname']);

      }

      if(!isset($input['medicalCertificate'])){
          $input['medicalCertificate'] = null;
      }
      if(!isset($input['fiscalCode'])){
        $input['fiscalCode'] = null;
      }
      if(!isset($input['publicSocial'])){
          $input['publicSocial'] = null;
      }
      if(!isset($input['importantInformation'])){
          $input['importantInformation'] = null;
      }
      if(!isset($input['otherGoals'])){
          $input['otherGoals'] = null;
      }
      if(!isset($input['plicometricData'])){
          $input['plicometricData'] = null;
      }
      if(!isset($input['inactiveTime'])){
          $input['inactiveTime'] = null;
      }
      if(!isset($input['previousSportTime'])){
          $input['previousSportTime'] = null;
      }
      if(!isset($input['previousSport'])){
          $input['previousSport'] = null;
      }
      if(!isset($input['oldDocumentImageName'])){
          $input['oldDocumentImageName'] = null;
      }
      if(!isset($input['oldDocumentImage'])){
          $input['oldDocumentImage'] = null;
      }
      if(!isset($input['oldParentDocumentImageName'])){
          $input['oldParentDocumentImageName'] = null;
      }
      if(!isset($input['oldParentDocumentImage'])){
          $input['oldParentDocumentImage'] = null;
      }


      $firebase = (new Firebase\Factory());

      if(isset($input['documentImage'])){
        $documentImage=$input['documentImage'];
        $uploadedImage = $request->file("documentImage");

        $imageName = rtrim(base64_encode(md5(microtime())),"=");
        $input['documentImageName'] = $imageName;
        $bucket = $firebase->createStorage()->getBucket();
        $str = $bucket->upload(file_get_contents($uploadedImage),
          [
              'name' => $imageName
          ]);

        $external = "19/10/2100 14:48:21";
        $format = "d/m/Y H:i:s";
        $dateobj = DateTime::createFromFormat($format, $external);

        $documentImage = $str->signedUrl($dateobj).PHP_EOL;

        if(isset($input['oldDocumentImageName'])){
          $oldImage = $input['oldDocumentImageName'];
          $obj = $bucket->object($oldImage);
      //    var_dump($oldImage);
          $obj->delete();
        }


      }
      else{
        $documentImage=$input['oldDocumentImage'];
        $input['documentImageName'] = $input['oldDocumentImageName'];
      }

      if($input['isUnderage']==true){
        if(isset($input['parentDocumentImage'])){
          $parentDocumentImage = $input['parentDocumentImage'];
          $uploadedParentImage = $request->file("parentDocumentImage");

          $imageName = rtrim(base64_encode(md5(microtime())),"=");
          $input['parentDocumentImageName'] = $imageName;
          $bucket = $firebase->createStorage()->getBucket();
          $str = $bucket->upload(file_get_contents($uploadedParentImage),
            [
                'name' => $imageName
            ]);

          $external = "19/10/2100 14:48:21";
          $format = "d/m/Y H:i:s";
          $dateobj = DateTime::createFromFormat($format, $external);

          $parentDocumentImage = $str->signedUrl($dateobj).PHP_EOL;

          if(isset($input['oldParentDocumentImageName'])){
            $oldImage = $input['oldParentDocumentImageName'];
            $obj = $bucket->object($oldImage);
            $obj->delete();
          }
        }
        else{
          $parentDocumentImage=$input['oldParentDocumentImage'];
          $input['parentDocumentImageName'] = $input['oldParentDocumentImageName'];
        }
      }

      if(isset($input['email'])){
        $firebase->createAuth()->changeUserEmail($input['idDatabase'], $input['email']);
      }



      $arrayUser = UsersManager::transformRequestIntoArrayUser($input,$documentImage,$parentDocumentImage);
      $collection->document($input['idDatabase'])->set($arrayUser);
      $input['idUserDatabase'] = $input['idDatabase'];

      $arrayMedicalHistory = MedicalHistoryManager::trasformRequestToArrayMedicalHistory($input);
      $arrayMedicalHistory['idDatabase'] = $input['medicalHistoryIdDatabase'];
      MedicalHistoryManager::setMedicalHistory($arrayMedicalHistory);


      toastr()->success('Utente modificato con successo.');
      return redirect('/admin/gestioneIscritti');
    }



    public static function setUserView($id,Request $request){
        $documents = $request->session()->pull('allUsers');
        $request->session()->put('allUsers', $documents);
        $medicalHistory;

        foreach ($documents as $document) {
          if($id == $document->getIdDatabase()){
            $user = $document;
            $medicalHistory = MedicalHistoryManager::getMedicalHistoryByUserId($user->getIdDatabase());
          }
        }

        return view('setUser', compact('user', 'medicalHistory'));
    }


    public static function getUsersByName($name){
        $users = array();
        $name = strtolower($name);
        $collection = Firestore::collection('Users');
        $query = $collection->where('name', '=' ,$name);
        $documents = $query->documents();
        foreach ($documents as $document) {
            $user = UsersManager::transformArrayUserIntoUser($document->data());
            $user->setName(ucfirst($user->getName()));
            $user->setSurname(ucfirst($user->getSurname()));
            $user->setIdDatabase($document->id());
            array_push($users,$user);
        }
        return $users;
    }


    public static function getUserById($idDatabase){
        $collection = Firestore::collection('Users');
        $arrayUser = $collection->document($idDatabase)->snapshot()->data();

        $user = UsersManager::transformArrayUserIntoUser($arrayUser);
        $user->setName(ucfirst($user->getName()));
        $user->setSurname(ucfirst($user->getSurname()));
        $user->setIdDatabase($idDatabase);
        return $user;
    }

    public static function activeUser($idDatabase){
      $collection = Firestore::collection('Users');
      $arrayUser = $collection->document($idDatabase)->snapshot()->data();

      $user = UsersManager::transformArrayUserIntoUser($arrayUser);
      $user->setIdDatabase($idDatabase);
      $user->setStatus(true);
      $user = UsersManager::transformUserIntoArrayUser($user);
      unset($user['idDatabase']);

      $collection->document($idDatabase)->set($user);

      toastr()->success('Utente Attivato.');
      return redirect('/admin/gestioneIscritti');

    }

    public static function deactivateUser($idDatabase){
      $collection = Firestore::collection('Users');
      $arrayUser = $collection->document($idDatabase)->snapshot()->data();

      $user = UsersManager::transformArrayUserIntoUser($arrayUser);
      $user->setIdDatabase($idDatabase);
      $user->setStatus(false);
      $user = UsersManager::transformUserIntoArrayUser($user);
      unset($user['idDatabase']);

      $collection->document($idDatabase)->set($user);


      toastr()->success('Utente Disattivato.');
      return redirect('/admin/gestioneIscritti');
    }




    public static function createUser(Request $request){
        $input = $request->all();
        $input['name'] = strtolower($input['name']);
        $input['surname'] = strtolower($input['surname']);

        if($input['password'] != $input['password2']){
          toastr()->error('Le due password non coincidono.');
          return redirect('/admin/nuovoIscritto');
        }

        $str = 'null';
        $str2 = 'null';

        if(!isset($input['documentImage'])){
          $documentImage = null;
          $input['documentImageName']=null;
        }
        else{
          $documentImageName = rtrim(base64_encode(md5(microtime())),"=");
          $input['documentImageName']=$documentImageName;
          $documentImage = $request->file('documentImage');
        }

        if(!isset($input['parentDocumentImage'])){
          $parentDocumentImage = null;
            $input['parentDocumentImageName']=null;
        }
        else{
          if($input['isUnderage'] == 'true'){
            $parentDocumentImageName = rtrim(base64_encode(md5(microtime())),"=");
            $input['parentDocumentImageName']=$parentDocumentImageName;
            $parentDocumentImage = $request->file('parentDocumentImage');
          }
        }


        $external = "19/10/2100 14:48:21";
        $format = "d/m/Y H:i:s";
        $dateobj = DateTime::createFromFormat($format, $external);


        $tr = new GoogleTranslate('it');

        $firebase = (new Firebase\Factory());

        if(isset($input['documentImage'])){
            $str = $firebase->createStorage()->getBucket()->upload(file_get_contents($documentImage),
                [
                    'name' => $documentImageName
                ]);
        }

        if($input['isUnderage'] == 'true'){
          if(isset($input['parentDocumentImage'])){
              $str2 = $firebase->createStorage()->getBucket()->upload(file_get_contents($parentDocumentImage),
                  [
                      'name' => $parentDocumentImage
                  ]);
              $parentDocumentImage = $str2->signedUrl($dateobj).PHP_EOL;

          }

            // $parentDocumentImage = "https://firebasestorage.googleapis.com/v0/b/fitandfight.appspot.com/o/". $str2 ."?alt=media";

            $timestamp = strtotime($input['parentDateOfBirth']);
            $input['parentDateOfBirth'] = date("d-m-Y", $timestamp);
            $timestamp = strtotime($input['parentDocumentReleaseDate']);
            $input['parentDocumentReleaseDate'] = date("d-m-Y", $timestamp);
            $input['parentName'] = strtolower($input['parentName']);
            $input['parentSurname'] = strtolower($input['parentSurname']);

        }
       // $documentImage =  "https://firebasestorage.googleapis.com/v0/b/fitandfight.appspot.com/o/". $str ."?alt=media";

       if(isset($input['documentImage'])){
        $documentImage = $str->signedUrl($dateobj).PHP_EOL;
       }



         //rtrim(base64_encode(md5(microtime())),"=");


        $collection = Firestore::collection('Users');


        $timestamp = strtotime($input['dateOfBirth']);
        $input['dateOfBirth'] = date("d-m-Y", $timestamp);
        $timestamp = strtotime($input['releaseDateDocument']);
        $input['releaseDateDocument'] = date("d-m-Y", $timestamp);




        try {
            $uid = $firebase->createAuth()->createUserWithEmailAndPassword($input['email'], $input['password'])->uid;

            if(!isset($input['publicSocial'])){
              $input['publicSocial'] = null;
            }
            if(!isset($input['medicalCertificate'])){
              $input['medicalCertificate'] = null;
            }
            if(!isset($input['fiscalCode'])){
              $input['fiscalCode'] = null;
            }

            $input['name'] = strtolower($input['name']);
            $input['surname'] = strtolower($input['surname']);

            $arrayUser = UsersManager::transformRequestIntoArrayUser($input, $documentImage, $parentDocumentImage);

            $collection->document($uid)->set($arrayUser);

            $input['idUserDatabase'] = $uid;

            if(!isset($input['importantInformation'])){
              $input['importantInformation'] = null;
            }
            if(!isset($input['otherGoals'])){
              $input['otherGoals'] = null;
            }
            if(!isset($input['plicometricData'])){
              $input['plicometricData'] = null;
            }
            if(!isset($input['inactiveTime'])){
              $input['inactiveTime'] = null;
            }
            if(!isset($input['previousSportTime'])){
              $input['previousSportTime'] = null;
            }
            if(!isset($input['previousSport'])){
              $input['previousSport'] = null;
            }





            $arrayMedicalHistory = MedicalHistoryManager::trasformRequestToArrayMedicalHistory($input);

            MedicalHistoryManager::addMedicalHistory($arrayMedicalHistory);

            toastr()->success('Utente registrato');
            return redirect('/admin/gestioneIscritti');

        } catch (AuthException $e) {

            toastr()->error($tr->translate($e->getMessage()));
            return redirect('/admin/nuovoIscritto');

        } catch (FirebaseException $e) {

            toastr()->error($tr->translate($e->getMessage()));
            return redirect('/admin/nuovoIscritto');
        }

    }

    public static function isAdult($user){
        if($user instanceof UserModel){
            if($user->getIsAdult() == TRUE){
                return TRUE;
            }
            else {
                return FALSE;
            }
        }
        if(data_get($user,'isAdult')){
            return TRUE;
        }
        else {
            return FALSE;
        }
    }

    public static function existsUsername($username){
        $collection = Firestore::collection('Users');
        $query = $collection->where('username', '=' ,$username);
        $documents = $query->documents();
        foreach ($documents as $document) {
            if ($document->exists()) {
                return TRUE;
            }
        }

        return FALSE;
    }

    public static function transformArrayUserIntoUser($arrayUser){



        $idDatabase = data_get($arrayUser,'idDatabase');
        $name = data_get($arrayUser,'name');
        $surname = data_get($arrayUser,'surname');
        $gender = data_get($arrayUser,'gender');
        $status = data_get($arrayUser,'status');
        $isAdult = data_get($arrayUser,'isAdult');
        $dateOfBirth = data_get($arrayUser,'dateOfBirth');
        $birthNation = data_get($arrayUser,'birthNation');
        $birthPlace = data_get($arrayUser,'birthPlace');


        $residence = array(
            'nation' => data_get($arrayUser, 'residence.nation'),
            'cityOfResidence' => data_get($arrayUser, 'residence.cityOfResidence'),
            'cap' => data_get($arrayUser, 'residence.cap'),
            'street' => data_get($arrayUser, 'residence.street'),
            'number' => data_get($arrayUser, 'residence.number')

        );

        $document = array(
            'documentImage' => data_get($arrayUser, 'document.documentImage'),
            'documentImageName' => data_get($arrayUser, 'document.documentImageName'),
            'type' => data_get($arrayUser, 'document.type'),
            'number' => data_get($arrayUser, 'document.number'),
            'released' => data_get($arrayUser, 'document.released'),
            'releaseDate' => data_get($arrayUser, 'document.releaseDate')
        );

        $email = data_get($arrayUser,'email');
        $telephoneNumber = data_get($arrayUser,'telephoneNumber');
        $publicSocial = data_get($arrayUser,'publicSocial');
        $medicalCertificate = data_get($arrayUser,'medicalCertificate');
        $fiscalCode = data_get($arrayUser,'fiscalCode');

        if(UsersManager::isAdult($arrayUser) == FALSE){
            $parentName = data_get($arrayUser,'parentName');
            $parentSurname = data_get($arrayUser,'parentSurname');
            $parentGender = data_get($arrayUser,'parentGender');
            $parentDateOfBirth = data_get($arrayUser,'parentDateOfBirth');
            $parentBirthNation = data_get($arrayUser,'parentBirthNation');
            $parentBirthPlace = data_get($arrayUser,'parentBirthPlace');

            $parentResidence = array(
                'nation' => data_get($arrayUser, 'parentResidence.nation'),
                'cityOfResidence' => data_get($arrayUser, 'parentResidence.cityOfResidence'),
                'cap' => data_get($arrayUser, 'parentResidence.cap'),
                'street' => data_get($arrayUser, 'parentResidence.street'),
                'number' => data_get($arrayUser, 'parentResidence.number')

            );

            $parentDocument = array(
                'documentImage' => data_get($arrayUser, 'parentDocument.documentImage'),
                'documentImageName' => data_get($arrayUser, 'parentDocument.documentImageName'),
                'type' => data_get($arrayUser, 'parentDocument.type'),
                'number' => data_get($arrayUser, 'parentDocument.number'),
                'released' => data_get($arrayUser, 'parentDocument.released'),
                'releaseDate' => data_get($arrayUser, 'parentDocument.releaseDate')
            );


            $parentEmail = data_get($arrayUser,'parentEmail');
            $parentTelephoneNumber = data_get($arrayUser,'parentTelephoneNumber');

            $user = new UserUnderageModel($idDatabase,$name,$surname,$gender,$status,$isAdult,$dateOfBirth,$birthNation,$birthPlace,$residence,$document,$email,$telephoneNumber,$publicSocial,$medicalCertificate,$fiscalCode,$parentName,$parentSurname,$parentGender,$parentDateOfBirth,$parentBirthNation,$parentBirthPlace,$parentResidence,$parentDocument,$parentEmail,$parentTelephoneNumber);

        }
        else{
            $user = new UserModel($idDatabase,$name,$surname,$gender,$status,$isAdult,$dateOfBirth,$birthNation,$birthPlace,$residence,$document,$email,$telephoneNumber,$publicSocial,$medicalCertificate,$fiscalCode);
        }


        return $user;
    }




    public static function transformUserIntoArrayUser(UserModel $user){
        $residence= array(
            'nation' => data_get($user->getResidence(),'nation'),
            'cityOfResidence' => data_get($user->getResidence(),'cityOfResidence'),
            'cap' => data_get($user->getResidence(),'cap'),
            'street' => data_get($user->getResidence(),'street'),
            'number' => data_get($user->getResidence(),'number')
        );
        $document = array(
            'documentImage' => data_get($user->getDocument(), 'documentImage'),
            'documentImageName' => data_get($user->getDocument(), 'documentImageName'),
            'type' => data_get($user->getDocument(),'type'),
            'number' => data_get($user->getDocument(),'number'),
            'released' => data_get($user->getDocument(),'released'),
            'releaseDate' => data_get($user->getDocument(),'releaseDate')
        );

        $arrayUser = array(
            'idDatabase' => $user->getIdDatabase(),
            'name' => $user->getName(),
            'surname' => $user->getSurname(),
            'gender' => $user->getGender(),
            'status' => $user->getStatus(),
            'isAdult' => $user->getIsAdult(),
            'dateOfBirth' => $user->getDateOfBirth(),
            'birthNation' => $user->getBirthNation(),
            'birthPlace' => $user->getBirthPlace(),
            'residence' => $residence,
            'document' => $document,
            'email' => $user->getEmail(),
            'telephoneNumber' => $user->getTelephoneNumber(),
            'publicSocial' => $user->getPublicSocial(),
            'medicalCertificate' => $user->getMedicalCertificate(),
            'fiscalCode' => $user->getFiscalCode()
        );

        if(UsersManager::isAdult($user) == FALSE){
            $parentResidence= array(
                'nation' => data_get($user->getParentResidence(),'nation'),
                'cityOfResidence' => data_get($user->getParentResidence(),'cityOfResidence'),
                'cap' => data_get($user->getParentResidence(),'cap'),
                'street' => data_get($user->getParentResidence(),'street') ,
                'number' => data_get($user->getParentResidence(),'number')
            );
            $parentDocument = array(
                'documentImage' => data_get($user->getParentDocument(), 'documentImage'),
                'documentImageName' => data_get($user->getParentDocument(), 'documentImageName'),
                'type' => data_get($user->getParentDocument(),'type'),
                'number' => data_get($user->getParentDocument(),'number'),
                'released' => data_get($user->getParentDocument(),'released'),
                'releaseDate' => data_get($user->getParentDocument(),'releaseDate')
            );
            $parentArray  = array(
                'parentName' => $user->getParentName(),
                'parentSurname' => $user->getParentSurname(),
                'parentGender' => $user->getParentGender(),
                'parentDateOfBirth' => $user->getParentDateOfBirth(),
                'parentBirthNation' => $user->getParentBirthNation(),
                'parentBirthPlace' => $user->getParentBirthPlace(),


                'parentResidence' => $parentResidence,
                'parentDocument' => $parentDocument,

                'parentEmail' => $user->getParentEmail(),
                'parentTelephoneNumber' => $user->getParentTelephoneNumber()
            );

            $arrayUser =   $arrayUser + $parentArray;

        }

        return $arrayUser;
    }

    private static function transformRequestIntoArrayUser( $input, $documentImage, $parentDocumentImage){

        $residence = array(
            'nation' => $input['nation'],
            'cityOfResidence' => $input['cityOfResidence'],
            'cap' => $input['cap'],
            'street' => $input['street'],
            'number' => $input['number']

        );
        $document = array(
            'documentImage' => $documentImage,
            'documentImageName' => $input['documentImageName'],
            'type' => $input['documentType'],
            'number' => $input['documentNumber'],
            'released' => $input['releaserDocument'],
            'releaseDate' => $input['releaseDateDocument']
        );

        if($input['isUnderage'] == 'false'){
            $isAdult = TRUE;
        }
        else{
            $isAdult = FALSE;
        }


        if($input['isUnderage'] == 'true'){
            $parentResidence = array(
                'nation' => $input['parentNation'],
                'cityOfResidence' => $input['parentCityOfResidence'],
                'cap' => $input['parentCap'],
                'street' => $input['parentResidenceStreet'],
                'number' => $input['parentResidenceNumber']

            );

            $parentDocument = array(
                'documentImage' => $parentDocumentImage,
                'documentImageName' => $input['parentDocumentImageName'],
                'type' => $input['parentDocumentType'],
                'number' => $input['parentDocumentNumber'],
                'released' => $input['parentDocumentReleaser'],
                'releaseDate' => $input['parentDocumentReleaseDate']
            );
        }
        if($input['isUnderage'] == 'true'){
            $arrayUser1 = array(
                'parentName' => $input['parentName'],
                'parentSurname' => $input['parentSurname'],
                'parentGender' => $input['parentGender'],
                'parentDateOfBirth' => $input['parentDateOfBirth'],
                'parentBirthNation' => $input['parentBirthNation'],
                'parentBirthPlace' => $input['parentBirthPlace'],
                'parentResidence' => $parentResidence,
                'parentDocument' => $parentDocument,
                'parentEmail' => $input['parentEmail'],
                'parentTelephoneNumber' => $input['parentTelephoneNumber']
            );
        }

        $arrayUser0 = array(
            'name' => $input['name'],
            'surname' => $input['surname'],
            'gender' => $input['gender'],
            'status' => TRUE,
            'isAdult' =>$isAdult,
            'dateOfBirth' => $input['dateOfBirth'],
            'birthNation' => $input['birthNation'],
            'birthPlace' => $input['birthPlace'],
            'residence' => $residence,
            'document' => $document,
            'email' => $input['email'],
            'telephoneNumber' =>   $input['telephone'],
            'publicSocial' => $input['publicSocial'],
            'medicalCertificate' => $input['medicalCertificate'],
            'fiscalCode' =>  $input['fiscalCode']
        );


        if($isAdult == TRUE){
            return $arrayUser0;
        }else{
            $arrayUser2 = $arrayUser0 + $arrayUser1;
            return $arrayUser2;
        }

    }

}
