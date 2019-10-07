<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\TrainingCardsModel;

class TrainingCardsManager extends Controller
{
  

    public static function transformTrainingCardsIntoArrayTrainingCards($trainingCards){
      $idDatabase = $trainingCards->getIdDatabase();
      $idUserDatabase = $trainingCards->getIdUserDatabase();
      $period = $trainingCards->getPeriod();
      $exercises = $trainingCards->getExercises();

      $arrayTrainingCards = array(
        'idDatabase' => $idDatabase,
        'idUserDatabase' => $idUserDatabase,
        'period' => $period,
        'exercises' => $exercises
      );

      return $arrayTrainingCards;
    }

    public static function transformArrayTrainingCardsIntoTrainingCards($arrayTrainingCards){
      $idDatabase = data_get($arrayTrainingCards,'idDatabase');
      $idUserDatabase = data_get($arrayTrainingCards,'idUserDatabase');
      $period = data_get($arrayTrainingCards,'period');
      $exercises = data_get($arrayTrainingCards,'exercises');

      $trainingCards = new TrainingCardsModel($idDatabase,$idUserDatabase,$period,$exercises);

      return $trainingCards;
    }
}
