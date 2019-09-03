<?php

namespace App\Http\Models;

use Illuminate\Support\Arr;

/**
 *
 */
class TrainingCardsModel extends AnotherClass
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


  function __construct($idDatabase,$idUserDatabase,$period,$exercises)
  {
    $this->$idDatabase = $idDatabase;
    $this->$idUserDatabase = $idUserDatabase;
    $this->$period = Arr::add(
        [
          'startDate' => get($period, 'startDate');,
          'endDate' => get($period, 'endDate');
        ]
    );

    $localCounter = 0;
    $this->$exercises = Arr::add(
      [
        foreach ($exercises as $exercise) {
          'exercise'.$localCounter = Arr::add([

              'idExerciseDatabase' => ,
              'serialNumber' => ,

              /*
                  Here I insert the variables of the exercise, but first I have to check if the variable
                  $exerciseIsATime (in to exercise) is set to TRUE
              */
            $exercise1 = ExercisesManager::getExerciseById(get($exercise,'idDatabase'););

            if($exercise1->$exerciseIsATime == TRUE){
              'workoutTime' = Arr::add(
                    [
                      'minutes' = get($exercise,'workoutTime.minutes');,
                      'seconds' = get($exercise,'workoutTime.seconds');
                    ]
               );,

               'restTime' = Arr::add(
                     [
                       'minutes' = get($exercise,'restTime.minutes');,
                       'seconds' = get($exercise,'restTime.seconds');
                     ]
                );
            }
            else{
              'numberOfRepetitions' => get($exercise,'numberOfRepetitions'); ,
              'restTime' = Arr::add(
                    [
                      'minutes' = get($exercise,'restTime.minutes');,
                      'seconds' = get($exercise,'restTime.seconds');
                    ]
               );
            }



          ]);
          $localCounter++;
        }

      ]
    );

  }
}
