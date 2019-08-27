<?php

namespace App\Http\Controllers;
use Google\Cloud\Firestore\FirestoreClient;
use Firevel\Firestore\Facades\Firestore;
use Illuminate\Http\Request;

class Firetest extends Controller
{
    public function test() {

        $collection = Firestore::collection('User');

        $todos = $collection->documents();

        foreach ($todos as $todo) {
            echo $todo['Nome'];
        }
    }


}
