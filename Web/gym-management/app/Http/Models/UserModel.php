
<?php

namespace App\Http\Models;

/**
 *
 */
class UserModel extends AnotherClass
{
  $idDatabase;
  $name;
  $surname;
  $status;
  $dateOfBirth;
  $birthNation;
  $birthPlace;
  $residence;
    /*
      residence:
          nation;
          cityOfResidence;
          cap;
          street;
          number;
    */
  $document;
    /*
      document:
          type;
          number;
          ReleaseDate;
          Released;
    */
  $email;
  $telephoneNumber;


  function __construct($idDatabase,$name,$surname,$status,$dateOfBirth,$birthNation,$birthPlace,$residence,$document,$email,$telephoneNumber)
  {
    $this->$idDatabase = $idDatabase;
    $this->$name = $name;
    $this->$surname = $surname;
    $this->$status = $status;
    $this->$dateOfBirth = $dateOfBirth;
    $this->$birthNation = $birthNation;
    $this->$birthPlace = $birthPlace;

    $this->$residence = Arr::add(
        [
          'nation' => data_get($residence, 'nation');,
          'cityOfResidence' => data_get($residence, 'cityOfResidence');,
          'cap' => data_get($residence, 'cap');,
          'street' => data_get($residence, 'street');,
          'number' => data_get($residence, 'number');
        ]
    );


    $this->$document = Arr::add(
        [
          'type' => data_get($document, 'type');,
          'number' => data_get($document, 'number');,
          'released' => data_get($document, 'released');,
          'releaseDate' => data_get($document, 'releaseDate');
        ]
    );

    $this->$email = $email;
    $this->$telephoneNumber = $telephoneNumber;
  }

}
