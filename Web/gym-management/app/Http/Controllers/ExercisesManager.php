<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google\Cloud\Firestore\FirestoreClient;
use Firevel\Firestore\Facades\Firestore;
use App\Http\Models\ExerciseModel;

class ExercisesManager extends Controller{

      public static function getAllExercises(){}

      public static function getExerciseById($idDatabase){
      }

      public static function trasformArrayExerciseToExercise($arrayExercise){
        $idDatabase = data_get($arrayExercise, 'idDatabase');
        $name = data_get($arrayExercise, 'name');
        $description = data_get($arrayExercise, 'description');
        $exerciseIsATime = data_get($arrayExercise, 'exerciseIsATime');
        $gif = data_get($arrayExercise, 'gif');
        $link = data_get($arrayExercise, 'link');

        $exercise = new ExerciseModel($idDatabase,$name,$description,$exerciseIsATime,$gif,$link);

        return $exercise;
      }

      public static function trasformExerciseToArrayExercise($exercise){
        $idDatabase = $exercise->getIdDatabase();
        $name = $exercise->getName();
        $description = $exercise->getDescription();
        $exerciseIsATime = $exercise->getExerciseIsATime();
        $gif = $exercise->getGif();
        $link = $exercise->getLink();

        $arrayExercise = array(
          'idDatabase' => $idDatabase,
          'name' => $name,
          'description' => $description,
          'exerciseIsATime' => $exerciseIsATime,
          'gif' => $gif,
          'link' => $link
        );

        return $arrayExercise;
      }

}
