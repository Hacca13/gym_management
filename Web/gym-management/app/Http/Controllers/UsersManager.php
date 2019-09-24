<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google\Cloud\Firestore\FirestoreClient;
use Firevel\Firestore\Facades\Firestore;
use App\Http\Models\UserModels\UserModel;
use App\Http\Models\UserModels\UserUnderageModel;

class UsersManager extends Controller
{
      //this function retorn all User
      public function getAllUser () {

        $collection = Firestore::collection('User');
        $allUser = $collection->documents()->snapshot()->data();

        return $allUser;
      }

      public function getUser(){}

      public function createUser($newUser){

        if($newUser->getIsAdult() == TRUE){
          $arrayUser = UsersManager::transformUserIntoArrayUser($newUser);
        }
        else{
          $arrayUser = UsersManager::transformUserUnderageIntoArrayUserUnderage($newUser);
        }

      }

      private static function transformArrayUserIntoUser($arrayUser){
        
      }


      private static function transformUserUnderageIntoArrayUserUnderage($arrayUser){

      }


      private static function transformUserIntoArrayUser($user){
        $residence= array(
          'nation' => data_get($user->getResidence(),'nation'),
          'cityOfResidence' => data_get($user->getResidence(),'cityOfResidence'),
          'cap' => data_get($user->getResidence(),'cap'),
          'street' => data_get($user->getResidence(),'street'),
          'number' => data_get($user->getResidence(),'number')
        );
        $document = array(
            'type' => data_get($user->getDocument(),'type'),
            'number' => data_get($user->getDocument(),'number'),
            'ReleaseDate' => data_get($user->getDocument(),'ReleaseDate'),
            'Released' => data_get($user->getDocument(),'Released')
        );

        $arrayUser = array(
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

        return $arrayUser
      }

      private static function transformUserUnderageIntoArrayUserUnderage($user){

        $residence= array(
          'nation' => data_get($user->getResidence(),'nation'),
          'cityOfResidence' => data_get($user->getResidence(),'cityOfResidence'),
          'cap' => data_get($user->getResidence(),'cap'),
          'street' => data_get($user->getResidence(),'street'),
          'number' => data_get($user->getResidence(),'number')
        );
        $document = array(
            'type' => data_get($user->getDocument(),'type'),
            'number' => data_get($user->getDocument(),'number'),
            'ReleaseDate' => data_get($user->getDocument(),'ReleaseDate'),
            'Released' => data_get($user->getDocument(),'Released')
        );

        $parentResidence= array(
          'nation' => data_get($user->getParentResidence(),'nation'),
          'cityOfResidence' => data_get($user->getParentResidence(),'cityOfResidence'),
          'cap' => data_get($user->getParentResidence(),'cap'),
          'street' => data_get($user->getParentResidence(),'street') ,
          'number' => data_get($user->getParentResidence(),'number')
        );
        $parentDocument = array(
            'type' => data_get($user->getParentDocument(),'type'),
            'number' => data_get($user->getParentDocument(),'number'),
            'ReleaseDate' => data_get($user->getParentDocument(),'ReleaseDate'),
            'Released' => data_get($user->getParentDocument(),'Released')
        );


        $arrayUser = array(
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

          'parentName' => $user->getParentName()
          'parentSurname' => $user->getParentSurnam(),
          'parentGender' => $user->getParentGender()
          'parentDateOfBirth' => $user->getParentDateOfBirth()
          'parentBirthNation' => $user->getParentBirthNation()
          'parentBirthPlace' => $user->getParentBirthPlace()


          'parentResidence' => $parentResidence,
          'parentDocument' => $parentDocument,

          'parentEmail' => $user->getParentEmail()
          'parentTelephoneNumber' => $user->getParentTelephoneNumber()
        );

        return $arrayUser;
      }

}
