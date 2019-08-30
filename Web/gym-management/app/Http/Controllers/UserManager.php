<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google\Cloud\Firestore\FirestoreClient;
use Firevel\Firestore\Facades\Firestore;

class UserManager extends Controller
{
    //this function retorn all User
    public function getAllUser () {

      $collection = Firestore::collection('User');
      $allUser = $collection->documents();


    }

    public function getUser(){}

    public function createUser(){}

}
