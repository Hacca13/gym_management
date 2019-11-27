<?php

namespace App\Http\Models;

/**
 *
 */
class ExerciseModel{
  private $idDatabase;
  private $name;
  private $description;
  private $exerciseIsATime;
  private $gif;
  private $gifName;
  private $link;

  function __construct($idDatabase,$name,$description,$exerciseIsATime,$gif,$gifName,$link){
    $this->idDatabase = $idDatabase;
    $this->name = $name;
    $this->description = $description;
    $this->exerciseIsATime = $exerciseIsATime;
    $this->gif = $gif;
    $this->gifName = $gifName;
    $this->link = $link;
  }

    /**
     * @return mixed
     */
    public function getGifName()
    {
        return $this->gifName;
    }

    /**
     * @param mixed $gifName
     */
    public function setGifName($gifName)
    {
        $this->gifName = $gifName;
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
     * Get the value of Description
     *
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of Description
     *
     * @param mixed description
     *
     * @return self
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of Exercise Is Time
     *
     * @return mixed
     */
    public function getExerciseIsATime()
    {
        return $this->exerciseIsATime;
    }

    /**
     * Set the value of Exercise Is Time
     *
     * @param mixed exerciseIsATime
     *
     * @return self
     */
    public function setExerciseIsATime($exerciseIsATime)
    {
        $this->exerciseIsATime = $exerciseIsATime;

        return $this;
    }

    /**
     * Get the value of Gif
     *
     * @return mixed
     */
    public function getGif()
    {
        return $this->gif;
    }

    /**
     * Set the value of Gif
     *
     * @param mixed gif
     *
     * @return self
     */
    public function setGif($gif)
    {
        $this->gif = $gif;

        return $this;
    }

    /**
     * Get the value of Link
     *
     * @return mixed
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set the value of Link
     *
     * @param mixed link
     *
     * @return self
     */
    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

}
