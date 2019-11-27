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
  private $imageName;
  private $instructor;
  private $isActive;
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

  function __construct($idDatabase,$name,$image,$imageName,$isActive,$instructor,$period,$weeklyFrequency,$usersList){

    $this->idDatabase = $idDatabase;
    $this->name = $name;
    $this->image = $image;
    $this->imageName = $imageName;
    $this->isActive = $isActive;
    $this->instructor = $instructor;
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
     * Get the value of ImageName
     *
     * @return mixed
     */
    public function getImageName()
    {
        return $this->imageName;
    }

    /**
     * Set the value of ImageName
     *
     * @param mixed imageName
     *
     * @return self
     */
    public function setImageName($imageName)
    {
        $this->imageName = $imageName;

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
     * Get the value of Is Active
     *
     * @return mixed
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Set the value of Is Active
     *
     * @param mixed isActive
     *
     * @return self
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

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
