<?php

namespace App\Http\Controllers;
use Google\Cloud\Firestore\FirestoreClient;
use Firevel\Firestore\Facades\Firestore;
use Illuminate\Http\Request;
use App\Http\Models\UserModels\UserModel;
use App\Http\Models\UserModels\UserUnderageModel;
use App\Http\Controllers\UsersManager;
use App\Http\Controllers\SubscriptionManager;
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
    $collection = Firestore::collection('MedicalHistory');
    $documents = $collection->document('hQq65ajzer49nzWk4lRD')->snapshot()->data();
  /*  foreach ($documents as $document){
  exercises
  0
  idExerciseDatabase
  "qcUJpzle2LoHowJO3yQ7"
  restTime
  minutes
  1
  seconds
  30
  serialNumber
  4
  workoutTime
  minutes
  2
  seconds
  0
  1
  idExerciseDatabase
  "U68MHeUUjjbAzgBpXTTt"
  numberOfRepetitions
  "8"
  restTime
  minutes
  1
  seconds
  "30"
  serialNumber
  3
  idUserDatabase
  "UEMkxzS6DodLuYRlMnSH"
  period
  endDate
  "31/07/2019"
  startDate
  "31/08/2019"
  */  }
    var_dump($documents);

    }

  public function test3(){

    $subscription = TrainingCardsManager::getAllTrainingCards();
    var_dump($subscription);

  }

  static function userToArrayUser(){
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
