<?php

namespace App\Http\Models\UserModels;

use Illuminate\Support\Arr;
/**
 *
 */
class UserModel
{
  protected $idDatabase;
  protected $name;
  protected $surname;
  protected $gender ;
  protected $username;
  protected $profilePicture;
  protected $status;
  protected $isAdult;
  protected $dateOfBirth;
  protected $birthNation;
  protected $birthPlace;
  protected $residence;
    /*
      residence:
          nation;
          cityOfResidence;
          cap;
          street;
          number;
    */
  protected $document;
    /*
      document:
          documentImage;
          type;
          number;
          ReleaseDate;
          Released;
    */
  protected $email;
  protected $telephoneNumber;

  public function __construct($idDatabase,$name,$surname,$gender,$username,$profilePicture,$status,$isAdult,$dateOfBirth,$birthNation,$birthPlace,$residence,$document,$email,$telephoneNumber){

    $this->idDatabase = $idDatabase;
    $this->name = $name;
    $this->surname = $surname;
    $this->gender = $gender;
    $this->username = $username;
    $this->profilePicture = $profilePicture ;
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
        'documentImage' => data_get($document, 'documentImage'),
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
