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


class UsersManager extends Controller{


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
        $perPage = 6;
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
        $perPage = 6;
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
    }

    public static function createUser(Request $request){
        $input = $request->all();

        if($input['password'] != $input['password2']){
          toastr()->error('Le due password non coincidono.');
          return redirect('/admin/nuovoIscritto');
        }

        $documentImage = $request->file('documentImage');
        $parentDocumentImage = null;

        $external = "19/10/2100 14:48:21";
        $format = "d/m/Y H:i:s";
        $dateobj = DateTime::createFromFormat($format, $external);


        if($input['isUnderage'] == 'true'){
            $parentDocumentImage = $request->file('parentDocumentImage');
        }

        $tr = new GoogleTranslate('it');

        $firebase = (new Firebase\Factory());

        $str = $firebase->createStorage()->getBucket()->upload(file_get_contents($documentImage),
            [
                'name' => '/esercizi/' . $input['name'].$input['surname'].'DocumentImage'
            ]);

        if($input['isUnderage'] == 'true'){
            $str2 = $firebase->createStorage()->getBucket()->upload(file_get_contents($parentDocumentImage),
                [
                    'name' => $input['parentName'].$input['parentSurname'].'ParentDocumentImage'
                ]);
            $parentDocumentImage = $str2->signedUrl($dateobj).PHP_EOL;



            // $parentDocumentImage = "https://firebasestorage.googleapis.com/v0/b/fitandfight.appspot.com/o/". $str2 ."?alt=media";

            $timestamp = strtotime($input['parentDateOfBirth']);
            $input['parentDateOfBirth'] = date("d-m-Y", $timestamp);
            $timestamp = strtotime($input['parentDocumentReleaseDate']);
            $input['parentDocumentReleaseDate'] = date("d-m-Y", $timestamp);
        }
       // $documentImage =  "https://firebasestorage.googleapis.com/v0/b/fitandfight.appspot.com/o/". $str ."?alt=media";


        $documentImage = $str->signedUrl($dateobj).PHP_EOL;



         //rtrim(base64_encode(md5(microtime())),"=");


        $collection = Firestore::collection('Users');


        $timestamp = strtotime($input['dateOfBirth']);
        $input['dateOfBirth'] = date("d-m-Y", $timestamp);
        $timestamp = strtotime($input['releaseDateDocument']);
        $input['releaseDateDocument'] = date("d-m-Y", $timestamp);


        try {
            $uid = $firebase->createAuth()->createUserWithEmailAndPassword($input['email'], $input['password'])->uid;

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
        $profileImage = data_get($arrayUser,'profileImage');
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
            'type' => data_get($arrayUser, 'document.type'),
            'number' => data_get($arrayUser, 'document.number'),
            'released' => data_get($arrayUser, 'document.released'),
            'releaseDate' => data_get($arrayUser, 'document.releaseDate')
        );

        $email = data_get($arrayUser,'email');
        $telephoneNumber = data_get($arrayUser,'telephoneNumber');

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
                'type' => data_get($arrayUser, 'parentDocument.type'),
                'number' => data_get($arrayUser, 'parentDocument.number'),
                'released' => data_get($arrayUser, 'parentDocument.released'),
                'releaseDate' => data_get($arrayUser, 'parentDocument.releaseDate')
            );


            $parentEmail = data_get($arrayUser,'parentEmail');
            $parentTelephoneNumber = data_get($arrayUser,'parentTelephoneNumber');

            $user = new UserUnderageModel($idDatabase,$name,$surname,$gender,$profileImage,$status,$isAdult,$dateOfBirth,$birthNation,$birthPlace,$residence,$document,$email,$telephoneNumber,$parentName,$parentSurname,$parentGender,$parentDateOfBirth,$parentBirthNation,$parentBirthPlace,$parentResidence,$parentDocument,$parentEmail,$parentTelephoneNumber);

        }
        else{
            $user = new UserModel($idDatabase,$name,$surname,$gender,$profileImage,$status,$isAdult,$dateOfBirth,$birthNation,$birthPlace,$residence,$document,$email,$telephoneNumber);
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
            'profilePicture' => $user->getProfilePicture(),
            'status' => $user->getStatus(),
            'isAdult' => $user->getIsAdult(),
            'dateOfBirth' => $user->getDateOfBirth(),
            'birthNation' => $user->getBirthNation(),
            'birthPlace' => $user->getBirthPlace(),
            'residence' => $residence,
            'document' => $document,
            'email' => $user->getEmail(),
            'telephoneNumber' => $user->getTelephoneNumber()
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
            'profileImage' => null,
            'status' => TRUE,
            'isAdult' =>$isAdult,
            'dateOfBirth' => $input['dateOfBirth'],
            'birthNation' => $input['birthNation'],
            'birthPlace' => $input['birthPlace'],
            'residence' => $residence,
            'document' => $document,
            'email' => $input['email'],
            'telephoneNumber' =>   $input['telephone']
        );


        if($isAdult == TRUE){
            return $arrayUser0;
        }else{
            $arrayUser2 = $arrayUser0 + $arrayUser1;
            return $arrayUser2;
        }

    }

}
