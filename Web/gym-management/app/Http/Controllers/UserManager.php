<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google\Cloud\Firestore\FirestoreClient;
use Firevel\Firestore\Facades\Firestore;

class UserManager extends Controller
{
    //
    public function getAllUser () {

      $collection = Firestore::collection('User');
      $allUser = $collection->documents();
      return view('welcome', compact('allUser'));
    }
}
