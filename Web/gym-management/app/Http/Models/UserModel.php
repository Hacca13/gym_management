<?php

namespace App\Http\Models;

use Illuminate\Support\Arr;
/**
 *
 */
class UserModel extends AnotherClass
{
  private $idDatabase;
  private $name;
  private $surname;
  private $username;
  private $status;
  private $dateOfBirth;
  private $birthNation;
  private $birthPlace;
  private $residence;
    /*
      residence:
          nation;
          cityOfResidence;
          cap;
          street;
          number;
    */
  private $document;
    /*
      document:
          type;
          number;
          ReleaseDate;
          Released;
    */
  private $email;
  private $telephoneNumber;


  function __construct($idDatabase,$name,$surname,$username,$status,$dateOfBirth,$birthNation,$birthPlace,$residence,$document,$email,$telephoneNumber)
  {
    $this->$idDatabase = $idDatabase;
    $this->$name = $name;
    $this->$surname = $surname;
    $this->$username = $username;
    $this->$status = $status;
    $this->$dateOfBirth = $dateOfBirth;
    $this->$birthNation = $birthNation;
    $this->$birthPlace = $birthPlace;

    $this->$residence = array(
        'nation' => get($residence, 'nation'),
        'cityOfResidence' => get($residence, 'cityOfResidence'),
        'cap' => get($residence, 'cap'),
        'street' => get($residence, 'street'),
        'number' => get($residence, 'number')

    );


    $this->$document = array(
        'type' => get($document, 'type'),
        'number' => get($document, 'number'),
        'released' => get($document, 'released'),
        'releaseDate' => get($document, 'releaseDate')
    );

    $this->$email = $email;
    $this->$telephoneNumber = $telephoneNumber;
  }

}
