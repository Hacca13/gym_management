<?php

namespace App\Http\Models;

/**
 *
 */
class ExerciseModel extends AnotherClass
{
  private $idDatabase:
  private $name;
  private $description;
  private $exerciseIsATime;
  private $gif;
  private $link;

  function __construct($idDatabase,$name,$description,$exerciseIsATime,$gif,$link)
  {
    $this->$idDatabase = $idDatabase;
    $this->$name = $name;
    $this->$description = $description;
    $this->$exerciseIsATime = $exerciseIsATime;
    $this->$gif = $gif;
    $this->$link = $link;
  }
}
