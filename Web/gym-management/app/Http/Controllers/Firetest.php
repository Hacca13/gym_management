<?php

namespace App\Http\Controllers;
use Google\Cloud\Firestore\FirestoreClient;
use Firevel\Firestore\Facades\Firestore;
use Illuminate\Http\Request;
use App\Http\Models\UserModels\UserModel;
use App\Http\Models\UserModels\UserUnderageModel;
use App\Http\Controllers\UsersManager;
use App\Http\Controllers\SubscriptionManager;
use App\Http\Controllers\MedicalHistoryManager;
use App\Http\Controllers\ExercisesManager;
use App\Http\Controllers\ProgressCollectionManager;
use App\Http\Controllers\CoursesManager;
use App\Http\Models\ExerciseModel;
use App\Http\Models\TrainingCardsModel;
use Illuminate\Support\Arr;
use App\Services\PayUService\Exception;
use App\Http\Models\MedicalHistoryModel;
use App\Http\Models\ProgressCollection;
use App\Http\Models\CourseModel;
use App\Http\Models\SubscriptionModels\SubscriptionModel;
use App\Http\Models\SubscriptionModels\SubscriptionRevenueModel;
use App\Http\Models\SubscriptionModels\SubscriptionCourseModel;
use App\Http\Models\SubscriptionModels\SubscriptionPeriodModel;
use Kreait\Firebase;

use Illuminate\Pagination\LengthAwarePaginator;

class Firetest extends Controller
{



    public function tester() {

    }


  public function test() {

    $collection = Firestore::collection('Exercises');
    $user = $collection->orderBy('name')->startAt(['esercizio'])->endAt(['esercizio\uf8ff'])->documents();

    foreach ($user as $key) {
      $key = ExercisesManager::trasformArrayExerciseToExercise($key->data());
      var_dump($key);
    }





  }


  public function test2(){

  /*  $original_date = "2019-03-31";

    // Creating timestamp from given date
    $timestamp = strtotime($original_date);

    // Creating new date format from that timestamp
    $new_date = date("d-m-Y", $timestamp);


    $timestamp = strtotime($new_date);
    // Creating new date format from that timestamp
    $new_date = date("Y-m-d", $timestamp);

    echo $new_date;

    $today = date("Y-m-d");

    echo $today;*/

    $today = '2019-11-05';
    $endDate = '2019-11-04';

    if($endDate < $today){
      echo 'true';
    }
    else{
      echo 'false';
    }


  }

  public static function testPage(Request $request,$currentPage){
      if($currentPage == 1){
        $documents = UsersManager::getAllUser();
        $request->session()->put('allUsers', $documents);
        var_dump('query al db');
      }
      else{
        //LA FUNZIONE PULL ELIMINA L'OGGETTO DALLA SESSIONE QUINDI EVITO IL PROBLEMA RINSERENDOLO
        $documents = $request->session()->pull('allUsers');
        $request->session()->put('allUsers', $documents);
          var_dump('nessuna query al db');
      }
      return $documents;
  }


  public function test3(){
    $today = date("Y-m-d");
    $todayPlus5Day = strtotime ( '+5 day' , strtotime ( $today ) ) ;
    $todayPlus5Day = date ( 'Y-m-d' , $todayPlus5Day );

    $timestamp = strtotime('30/11/2019');
    $endDate = date("Y-m-d", $timestamp);


    if($today >= $endDate and $endDate <= $todayPlus5Day){

      echo "scade tra qualche giorno";

    }

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
