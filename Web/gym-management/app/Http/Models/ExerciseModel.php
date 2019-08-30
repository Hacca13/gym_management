<?php

namespace App\Http\Models;

/**
 *
 */
class ExerciseModel extends AnotherClass
{
  $idDatabase:
  $name;
  $description;
  $isometric;
  $gif;
  $link;

  function __construct($idDatabase,$name,$description,$isometric,$gif,$link)
  {
    $this->$idDatabase = $idDatabase;
    $this->$name = $name;
    $this->$description = $description;
    $this->$isometric = $isometric;
    $this->$gif = $gif;
    $this->$link = $link;
  }
}
