<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google\Cloud\Firestore\FirestoreClient;
use Firevel\Firestore\Facades\Firestore;

class ExercisesManager extends Controller
{
      public function getAllExercises(){}

      public function getExerciseById($idDatabase){

          $collection = Firestore::collection('Exercises');
          $exercise = $collection->document($idDatabase)->snapshot()->data();
      }
}
