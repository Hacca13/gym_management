<?php

namespace App\Http\Models;

use Illuminate\Support\Arr;

/**
 *
 */
class TrainingCardsModel
{
  private $idDatabase;
  private $idUserDatabase;
  private $period;
  /*
    $period:
      $startDate;
      $endDate;
  */


  private $exercises;
  /*
    array
    $exercises:
        //If the variable $exerciseIsATime is set to TRUE
        $exercise1:
            $idExerciseDatabase;
            $serialNumber;
            $workoutTime:
                $minutes;
                $seconds;
            $restTime:
                $minutes;
                $seconds;


        //If the variable $exerciseIsATime is set to FALSE
        $exercise2:
            $idExerciseDatabase;
            $serialNumber;
            $numberOfRepetitions
            $restTime:
                $minutes;
                $seconds;

        $ecc...
  */


  function __construct($idDatabase,$idUserDatabase,$period,$exercises){
      $this->idDatabase = $idDatabase;
      $this->idUserDatabase = $idUserDatabase;
      $this->period = array(
        'startDate' => data_get($period, 'startDate'),
        'endDate' => data_get($period, 'endDate')
      );

      $localCounter = 0;
      $this->exercises = array(
          foreach ($exercises as $exercise) {
              'exercise'.$localCounter =  array(
                  'idExerciseDatabase' => data_get($exercise, 'idExerciseDatabase'),
                  'serialNumber' => data_get($exercise, 'serialNumber'),
                  /*
                      Here I insert the variables of the exercise, but first I have to check if the variable
                      $exerciseIsATime (in to exercise) is set to TRUE
                  */
                  $selectedExercise = ExercisesManager::getExerciseById(data_get($exercise,'idDatabase'));

                  if($selectedExercise->exerciseIsATime == TRUE){
                      'workoutTime' => array(
                          'minutes' =>data_get($exercise,'workoutTime.minutes'),
                          'seconds' =>data_get($exercise,'workoutTime.seconds')
                      );
                      'restTime' => array(
                          'minutes' =>data_get($exercise,'restTime.minutes'),
                          'seconds' =>data_get($exercise,'restTime.seconds')
                      );
                  }
                  else{
                      'numberOfRepetitions' => data_get($exercise,'numberOfRepetitions'),
                      'restTime' => array(
                          'minutes' =>data_get($exercise,'restTime.minutes'),
                          'seconds' =>data_get($exercise,'restTime.seconds')
                      );
                  }
              $localCounter++;
          }
      );
  }



?>
