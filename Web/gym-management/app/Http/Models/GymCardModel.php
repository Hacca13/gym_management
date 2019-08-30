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
            $numberOfNepetitions
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

    $this->$exercises = Arr::add(
      [

      ]
    );

  }
}
