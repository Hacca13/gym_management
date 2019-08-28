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


}
