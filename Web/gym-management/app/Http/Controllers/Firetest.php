<?php

namespace App\Http\Controllers;
use Google\Cloud\Firestore\FirestoreClient;
use Firevel\Firestore\Facades\Firestore;
use Illuminate\Http\Request;

class Firetest extends Controller
{
  public function test() {

    $collection = Firestore::collection('User');
    $user = $collection->document('fSVIao7b2BKQYuP01sqN')->snapshot()->data();

    var_dump($user);


  }

  public function test2(){
    $user = [
      'Nome' => 'Mirko',
      'Cognome' => 'Aliberti'
    ];
    $collection = Firestore::collection('User');
    $users = $collection->add($user);
    echo 'Tutto bene';
  }



}
