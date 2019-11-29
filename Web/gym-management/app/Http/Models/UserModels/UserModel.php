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
  protected $profileImage;
  protected $profileImageName;
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

  public function __construct($idDatabase,$name,$surname,$gender,$profileImage,$profileImageName,$status,$isAdult,$dateOfBirth,$birthNation,$birthPlace,$residence,$document,$email,$telephoneNumber){

    $this->idDatabase = $idDatabase;
    $this->name = $name;
    $this->surname = $surname;
    $this->gender = $gender;
    $this->profileImage = $profileImage ;
    $this->profileImageName = $profileImageName ;
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
     * @return mixed
     */
    public function getProfileImageName()
    {
        return $this->profileImageName;
    }

    /**
     * @param mixed $profileImageName
     */
    public function setProfileImageName($profileImageName)
    {
        $this->profileImageName = $profileImageName;
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
     * Get the value of Surname
     *
     * @return mixed
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Set the value of Surname
     *
     * @param mixed surname
     *
     * @return self
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Get the value of Gender
     *
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set the value of Gender
     *
     * @param mixed gender
     *
     * @return self
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get the value of Profile Image
     *
     * @return mixed
     */
    public function getProfileImage()
    {
        return $this->profileImage;
    }

    /**
     * Set the value of Profile Image
     *
     * @param mixed profileImage
     *
     * @return self
     */
    public function setProfileImage($profileImage)
    {
        $this->profileImage = $profileImage;

        return $this;
    }

    /**
     * Get the value of Status
     *
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of Status
     *
     * @param mixed status
     *
     * @return self
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of Is Adult
     *
     * @return mixed
     */
    public function getIsAdult()
    {
        return $this->isAdult;
    }

    /**
     * Set the value of Is Adult
     *
     * @param mixed isAdult
     *
     * @return self
     */
    public function setIsAdult($isAdult)
    {
        $this->isAdult = $isAdult;

        return $this;
    }

    /**
     * Get the value of Date Of Birth
     *
     * @return mixed
     */
    public function getDateOfBirth()
    {
        return $this->dateOfBirth;
    }

    /**
     * Set the value of Date Of Birth
     *
     * @param mixed dateOfBirth
     *
     * @return self
     */
    public function setDateOfBirth($dateOfBirth)
    {
        $this->dateOfBirth = $dateOfBirth;

        return $this;
    }

    /**
     * Get the value of Birth Nation
     *
     * @return mixed
     */
    public function getBirthNation()
    {
        return $this->birthNation;
    }

    /**
     * Set the value of Birth Nation
     *
     * @param mixed birthNation
     *
     * @return self
     */
    public function setBirthNation($birthNation)
    {
        $this->birthNation = $birthNation;

        return $this;
    }

    /**
     * Get the value of Birth Place
     *
     * @return mixed
     */
    public function getBirthPlace()
    {
        return $this->birthPlace;
    }

    /**
     * Set the value of Birth Place
     *
     * @param mixed birthPlace
     *
     * @return self
     */
    public function setBirthPlace($birthPlace)
    {
        $this->birthPlace = $birthPlace;

        return $this;
    }

    /**
     * Get the value of Residence
     *
     * @return mixed
     */
    public function getResidence()
    {
        return $this->residence;
    }

    /**
     * Set the value of Residence
     *
     * @param mixed residence
     *
     * @return self
     */
    public function setResidence($residence)
    {
        $this->residence = $residence;

        return $this;
    }

    /**
     * Get the value of Document
     *
     * @return mixed
     */
    public function getDocument()
    {
        return $this->document;
    }

    /**
     * Set the value of Document
     *
     * @param mixed document
     *
     * @return self
     */
    public function setDocument($document)
    {
        $this->document = $document;

        return $this;
    }

    /**
     * Get the value of Email
     *
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of Email
     *
     * @param mixed email
     *
     * @return self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of Telephone Number
     *
     * @return mixed
     */
    public function getTelephoneNumber()
    {
        return $this->telephoneNumber;
    }

    /**
     * Set the value of Telephone Number
     *
     * @param mixed telephoneNumber
     *
     * @return self
     */
    public function setTelephoneNumber($telephoneNumber)
    {
        $this->telephoneNumber = $telephoneNumber;

        return $this;
    }

    public function getProfilePicture() {
        return $this->profileImage;
    }

}
