<?php

namespace App\Http\Models;

use Illuminate\Support\Arr;

/**
 *
 */
class CourseModel{

  private $idDatabase;
  private $name;
  private $image;
  private $instructor;
  private $numberOfSubscribers;
  private $period;
  /*
      $period:
          $startDate;
          $endDate;
  */
  private $weeklyFrequency;
  /*  array
      $weeklyFrequency:
          0:
              $day;
              $startTime:
                  $hour;
                  $minutes;
              $endTime:
                  $hour;
                  $minutes;
          1:
              $day;
              $startTime:
                  $hour;
                  $minutes;
              $endTime:
                  $hour;
                  $minutes;
  */
  private $usersList;

  function __construct($idDatabase,$name,$image,$instructor,$numberOfSubscribers,$period,$weeklyFrequency,$usersList){

    $this->idDatabase = $idDatabase;
    $this->name = $name;
    $this->image = $image;
    $this->instructor = $instructor;
    $this->numberOfSubscribers = $numberOfSubscribers;
    $this->period = array(

      'startDate' => data_get($period, 'startDate'),
      'endDate' => data_get($period, 'endDate')

    );

    $this->weeklyFrequency =  array();

    foreach ($weeklyFrequency as $day) {
      array_push($this->weeklyFrequency,$day);
    }

    $this->usersList =  array();
    foreach ($usersList as $user) {
      array_push($this->usersList,$user);
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
     * Get the value of Name
     *
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of Name
     *
     * @param mixed name
     *
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of Image
     *
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of Image
     *
     * @param mixed image
     *
     * @return self
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get the value of Instructor
     *
     * @return mixed
     */
    public function getInstructor()
    {
        return $this->instructor;
    }

    /**
     * Set the value of Instructor
     *
     * @param mixed instructor
     *
     * @return self
     */
    public function setInstructor($instructor)
    {
        $this->instructor = $instructor;

        return $this;
    }

    /**
     * Get the value of Number Of Subscribers
     *
     * @return mixed
     */
    public function getNumberOfSubscribers()
    {
        return $this->numberOfSubscribers;
    }

    /**
     * Set the value of Number Of Subscribers
     *
     * @param mixed numberOfSubscribers
     *
     * @return self
     */
    public function setNumberOfSubscribers($numberOfSubscribers)
    {
        $this->numberOfSubscribers = $numberOfSubscribers;

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
     * Get the value of Weekly Frequency
     *
     * @return mixed
     */
    public function getWeeklyFrequency()
    {
        return $this->weeklyFrequency;
    }

    /**
     * Set the value of Weekly Frequency
     *
     * @param mixed weeklyFrequency
     *
     * @return self
     */
    public function setWeeklyFrequency($weeklyFrequency)
    {
        $this->weeklyFrequency = $weeklyFrequency;

        return $this;
    }

    /**
     * Get the value of Users List
     *
     * @return mixed
     */
    public function getUsersList()
    {
        return $this->usersList;
    }

    /**
     * Set the value of Users List
     *
     * @param mixed usersList
     *
     * @return self
     */
    public function setUsersList($usersList)
    {
        $this->usersList = $usersList;

        return $this;
    }

}


 ?>
