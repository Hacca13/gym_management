<?php

namespace App\Http\Models;

use Illuminate\Support\Arr;

/**
 *
 */
class TrainingCardsModel{

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
              $day;
              $exerciseExecutionDate
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
              $numberOfRepetitions;
              $day;
              $exerciseExecutionDate
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

        $this->exercises = array();
        foreach ($exercises as $exercise) {
          array_push($this->exercises, $exercise);
        }

    }

    /**
     * Get the value of Id Database
     *
     * @return mixed
     */
    public function getIdDatabase()
    {
        return $this->idDatabase;
    }

    /**
     * Set the value of Id Database
     *
     * @param mixed idDatabase
     *
     * @return self
     */
    public function setIdDatabase($idDatabase)
    {
        $this->idDatabase = $idDatabase;

        return $this;
    }

    /**
     * Get the value of Id User Database
     *
     * @return mixed
     */
    public function getIdUserDatabase()
    {
        return $this->idUserDatabase;
    }

    /**
     * Set the value of Id User Database
     *
     * @param mixed idUserDatabase
     *
     * @return self
     */
    public function setIdUserDatabase($idUserDatabase)
    {
        $this->idUserDatabase = $idUserDatabase;

        return $this;
    }

    /**
     * Get the value of Period
     *
     * @return mixed
     */
    public function getPeriod()
    {
        return $this->period;
    }

    /**
     * Set the value of Period
     *
     * @param mixed period
     *
     * @return self
     */
    public function setPeriod($period)
    {
        $this->period = $period;

        return $this;
    }

    /**
     * Get the value of Exercises
     *
     * @return mixed
     */
    public function getExercises()
    {
        return $this->exercises;
    }

    /**
     * Set the value of Exercises
     *
     * @param mixed exercises
     *
     * @return self
     */
    public function setExercises($exercises)
    {
        $this->exercises = $exercises;

        return $this;
    }

}



?>
