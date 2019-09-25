<?php

namespace App\Http\Controllers;
use Google\Cloud\Firestore\FirestoreClient;
use Firevel\Firestore\Facades\Firestore;
use Illuminate\Http\Request;
use App\Http\Models\UserModels\UserModel;
use App\Http\Models\UserModels\UserUnderageModel;
use App\Http\Controllers\UsersManager;
use App\Http\Models\ExerciseModel;
use App\Http\Models\TrainingCardsModel;
use Illuminate\Support\Arr;
use App\Services\PayUService\Exception;
use App\Http\Controllers\ExercisesManager;
use App\Http\Models\MedicalHistoryModel;
use App\Http\Models\ProgressCollection;
use App\Http\Models\CourseModel;
use App\Http\Models\SubscriptionModels\SubscriptionModel;
use App\Http\Models\SubscriptionModels\SubscriptionRevenueModel;
use App\Http\Models\SubscriptionModels\SubscriptionCourseModel;
use App\Http\Models\SubscriptionModels\SubscriptionPeriodModel;


class Firetest extends Controller
{
  public function test() {

    $collection = Firestore::collection('Users');
    $user = $collection->document('UEMkxzS6DodLuYRlMnSH')->snapshot()->data();
    $collection2 = Firestore::collection('Exercises');
    $exercise = $collection2->document('U68MHeUUjjbAzgBpXTTt')->snapshot()->data();
    var_dump($user);
    var_dump($exercise);

  }


  public function test2(){
    echo 'Pelo';
  }

  public function test3(){
    $users = UsersManager::getAllUser();
  //  $userArray = Firetest::userToArrayUser($user);

    var_dump($users);
  //  $collection = Firestore::collection('Users');
  //  $user2 = $collection->add($userArray);
//    var_dump($user2);
  }

  static function userToArrayUser($user){
    $residence= array(
      'nation' => 'Ungheria',
      'cityOfResidence' => 'Sala C',
      'cap' => '84036',
      'street' => 'via roma' ,
      'number' => 'SNC'
    );
    $document = array(
        'documentImage' => 'documentImage',
        'type' => 'Patente',
        'number' => 'SA47838',
        'released' => 'Motorizzazione civile',
        'releaseDate' => '13/05/2012'
    );
    $parentResidence= array(
      'nation' => 'Ungheria',
      'cityOfResidence' => 'Sala C',
      'cap' => '84036',
      'street' => 'via roma' ,
      'number' => 'SNC'
    );
    $parentDocument = array(
        'documentImage' => 'documentImage',
        'type' => 'Patente',
        'number' => 'SA47838',
        'releaseDate' => '13/05/2012',
        'released' => 'Motorizzazione civile'
    );


    $userArray = array(
      'idDatabase' => 'NULL',
      'name' => 'mirko',
      'surname' => 'aliberti',
      'username' => 'mirko3',
      'gender' => 'Uomo',
      'profilePicture' => 'stica.png' ,
      'status' => True,
      'isAdult' => True,
      'dateOfBirth' => '12/02/1993',
      'birthNation' => 'Ungheria',
      'birthPlace' => 'Roma',
      'residence' => $residence,
      'document' => $document,
      'email' => 'M.Aliberti3@salvatorearuba.com',
      'telephoneNumber' => '436726537265',

      'parentName' => 'parentName',
      'parentSurname' => 'parentSurname',
      'parentGender' => 'parentGender',
      'parentDateOfBirth' => 'parentDateOfBirth',
      'parentBirthNation' => 'parentBirthNation',
      'parentBirthPlace' => 'parentBirthPlace',


      'parentResidence' => $parentResidence,
      'parentDocument' => $parentDocument,

      'parentEmail' => 'parentEmail',
      'parentTelephoneNumber' => 'parentTelephoneNumber'

    );

    return $userArray;
  }

  static function createUser(){
    $idDatabase= 'PELO';
    $name= 'mirko';
    $surname='aliberti';
    $username = 'mirko3';
    $gender = 'Uomo';
    $profilePicture = 'stica.png' ;
    $status = True;
    $isAdult = True;
    $dateOfBirth= '12/02/1993';
    $birthNation= 'Ungheria';
    $birthPlace = 'Roma';
    $residence= array(
      'nation' => 'Ungheria',
      'cityOfResidence' => 'Sala C',
      'cap' => '84036',
      'street' => 'via roma' ,
      'number' => 'SNC'
    );
      /*
        residence:
            nation;
            cityOfResidence;
            cap;
            street;
            number;
      */
    $document = array(
        'documentImage' => 'documentImage',
        'type' => 'Patente',
        'number' => 'SA47838',
        'released' => 'Motorizzazione civile',
        'releaseDate' => '13/05/2012'
    );
      /*
        document:
            documentImage;
            type;
            number;
            ReleaseDate;
            Released;
      */
    $email = 'M.Aliberti3@salvatorearuba.com';
    $telephoneNumber = '436726537265';

    $parentName = 'parentName';
    $parentSurname = 'parentSurname';
    $parentGender = 'parentGender';
    $parentDateOfBirth = 'parentDateOfBirth';
    $parentBirthNation = 'parentBirthNation';
    $parentBirthPlace = 'parentBirthPlace';

    $parentResidence = array(
      'nation' => 'Ungheria',
      'cityOfResidence' => 'Sala C',
      'cap' => '84036',
      'street' => 'via roma' ,
      'number' => 'SNC'
    );
    $parentDocument = array(
        'documentImage' => 'documentImage',
        'type' => 'Patente',
        'number' => 'SA47838',
        'releaseDate' => '13/05/2012',
        'released' => 'Motorizzazione civile'
    );


    $parentEmail = 'parentEmail';
    $parentTelephoneNumber = 'parentTelephoneNumber';


    $user = new UserUnderageModel($idDatabase,$name,$surname,$gender,$username,$profilePicture,$status,$isAdult,$dateOfBirth,$birthNation,$birthPlace,$residence,$document,$email,$telephoneNumber,$parentName,$parentSurname,$parentGender,$parentDateOfBirth,$parentBirthNation,$parentBirthPlace,$parentResidence,$parentDocument,$parentEmail,$parentTelephoneNumber);

    return $user;
  }


}
