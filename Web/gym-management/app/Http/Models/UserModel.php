<?php

namespace App\Http\Models;

use Illuminate\Support\Arr;
/**
 *
 */
class UserModel
{
  private $idDatabase;
  private $name;
  private $surname;
  private $username;
  private $status;
  private $isAdult;
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

  public function __construct($idDatabase,$name,$surname,$username,$status,$isAdult,$dateOfBirth,$birthNation,$birthPlace,$residence,$document,$email,$telephoneNumber){

    $this->idDatabase = $idDatabase;
    $this->name = $name;
    $this->surname = $surname;
    $this->username = $username;
    $this->status = $status;
    $this->isAdult = $isAdult;
    $this->dateOfBirth = $dateOfBirth;
    $this->birthNation = $birthNation;
    $this->birthPlace = $birthPlace;

    $this->residence = array(
      'nation' => data_get($residence, 'nation'),
      'cityOfResidence' => data_get($residence, 'cityOfResidence'),
      'cap' => data_get($residence, 'cap'),
      'street' => data_get($residence, 'street'),
      'number' => data_get($residence, 'number')

    );

    $this->document = array(
        'type' => data_get($document, 'type'),
        'number' => data_get($document, 'number'),
        'released' => data_get($document, 'released'),
        'releaseDate' => data_get($document, 'releaseDate')
    );

    $this->email = $email;
    $this->telephoneNumber = $telephoneNumber;
  }

  public function getName(){
    return $this->name;
  }
  public function setName($name){
    $this->name = name;
  }

}
