
<?php

namespace App\Http\Models;

use Illuminate\Support\Arr;
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
          'nation' => get($residence, 'nation');,
          'cityOfResidence' => get($residence, 'cityOfResidence');,
          'cap' => get($residence, 'cap');,
          'street' => get($residence, 'street');,
          'number' => get($residence, 'number');
        ]
    );


    $this->$document = Arr::add(
        [
          'type' => get($document, 'type');,
          'number' => get($document, 'number');,
          'released' => get($document, 'released');,
          'releaseDate' => get($document, 'releaseDate');
        ]
    );

    $this->$email = $email;
    $this->$telephoneNumber = $telephoneNumber;
  }

}
