<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google\Cloud\Firestore\FirestoreClient;
use Firevel\Firestore\Facades\Firestore;
use App\Http\Models\UserModels\UserModel;
use App\Http\Models\UserModels\UserUnderageModel;

class UsersManager extends Controller{


      //this function retorn all User
      public static function getAllUser () {

        $collection = Firestore::collection('Users');
        $allUser = $collection->documents()->snapshot()-data();

        var_dump($allUser);
      //  return $allUser;
      }

      public static function getUserByName($name){

      }

      public static function getUserById($idDatabase){

        $arrayUser = $collection->documents($idDatabase)->snapshot()->data();

        $user = $this->transformArrayUserIntoUser($arrayUser);

        return $user;
      }

      public static function createUser($newUser){

        if($newUser->getIsAdult() == TRUE){
          $arrayUser = UsersManager::transformUserIntoArrayUser($newUser);
        }
        else{
          $arrayUser = UsersManager::transformUserUnderageIntoArrayUserUnderage($newUser);
        }

        $collection->add($arrayUser);

      }

      public static function transformArrayUserIntoUser($arrayUser){
        $idDatabase = data_get($arrayUser,'idDatabase');
        $name = data_get($arrayUser,'name');
        $surname = data_get($arrayUser,'surname');
        $gender = data_get($arrayUser,'gender');
        $username = data_get($arrayUser,'username');
        $profilePicture = data_get($arrayUser,'profilePicture');
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

        $user = new UserModel($idDatabase,$name,$surname,$gender,$username,$profilePicture,$status,$isAdult,$dateOfBirth,$birthNation,$birthPlace,$residence,$document,$email,$telephoneNumber);

        return $user;
      }


      public static function transformArrayUserUnderageIntoUserUnderage($arrayUser){
        $idDatabase = data_get($arrayUser,'idDatabase');
        $name = data_get($arrayUser,'name');
        $surname = data_get($arrayUser,'surname');
        $gender = data_get($arrayUser,'gender');
        $username = data_get($arrayUser,'username');
        $profilePicture = data_get($arrayUser,'profilePicture');
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

        $user = new UserUnderageModel($idDatabase,$name,$surname,$gender,$username,$profilePicture,$status,$isAdult,$dateOfBirth,$birthNation,$birthPlace,$residence,$document,$email,$telephoneNumber,$parentName,$parentSurname,$parentGender,$parentDateOfBirth,$parentBirthNation,$parentBirthPlace,$parentResidence,$parentDocument,$parentEmail,$parentTelephoneNumber);

        return $user;
      }


      public static function transformUserIntoArrayUser($user){
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
          'username' => $user->getUsername(),
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

        return $arrayUser;
      }

      public static function transformUserUnderageIntoArrayUserUnderage($user){

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


        $arrayUser = array(
          'idDatabase' => $user->getIdDatabase(),
          'name' => $user->getName(),
          'surname' => $user->getSurname(),
          'username' => $user->getUsername(),
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
          'telephoneNumber' => $user->getTelephoneNumber(),

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

        return $arrayUser;
      }

}
