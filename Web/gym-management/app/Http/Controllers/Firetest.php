<?php

namespace App\Http\Controllers;
use Google\Cloud\Firestore\FirestoreClient;
use Firevel\Firestore\Facades\Firestore;
use Illuminate\Http\Request;
use App\Http\Models\UserModel;
use Illuminate\Support\Arr;

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
    $idDatabase= NULL;
    $name= 'mirko';
    $surname='aliberti';
    $username = 'mirko3';
    $status = True;
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
        'type' => 'Patente',
        'number' => 'SA47838',
        'ReleaseDate' => '13/05/2012',
        'Released' => 'Motorizzazione civile'
    );
      /*
        document:
            type;
            number;
            ReleaseDate;
            Released;
      */
    $email = 'M.Aliberti3@salvatorearuba.com';
    $telephoneNumber = '436726537265';

    $newUser = new UserModel($idDatabase,$name,$surname,$username,$status,$dateOfBirth,$birthNation,$birthPlace,$residence,$document,$email,$telephoneNumber);
    var_dump($newUser);


  /*  $residence = array('nation' => 'Ungheria', 'pippo' =>'pluto');
  //  $residence= Arr::add($residence,'nation','Ungheria');
    var_dump($residence);*/
  }



}
