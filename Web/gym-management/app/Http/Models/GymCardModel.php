<?php

namespace App\Http\Models;

use Illuminate\Support\Arr;
/**
 *
 */
class GymCardModel extends AnotherClass
{
  $idDatabase;
  $idUserDatabase;
  $period;
  /*
    $period:
      $startDate;
      $endDate;
  */


  $exercises;
  /*
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


  function __construct($idDatabase,$idUserDatabase,$period,$exercises)
  {
    $this->$idDatabase = $idDatabase;
    $this->$idUserDatabase = $idUserDatabase;
    $this->$period = Arr::add(
        [
          'startDate' => data_get($period, 'startDate');,
          'endDate' => data_get($period, 'endDate');
        ]
    );

    $localCounter = 0;
    $this->$exercises = Arr::add(
      [
        foreach ($exercises as $exercise) {
          'exercise'.$localCounter = Arr::add([
              /*
                  Here I insert the variables of the exercise, but first I have to check if the variable $exerciseIsATime (in to exercise) is set to TRUE
              */
          ]);
          $localCounter++;
        }

      ]
    );

  }
}
