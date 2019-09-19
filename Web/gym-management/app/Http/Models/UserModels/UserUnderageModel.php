<?php

/**
 *
 */
class UserUnderageModel extends UserModel
{

  protected $parentName;
  protected $parentSurname;
  protected $parentGender;
  protected $parentDateOfBirth;
  protected $parentBirthNation;
  protected $parentBirthPlace;
  protected $parentResidence;
  protected $parentDocument;
  protected $parentEmail;
  protected $parentTelephoneNumber;

  function __construct($idDatabase,$name,$surname,$gender,$username,$profilePicture,$status,$isAdult,$dateOfBirth,$birthNation,$birthPlace,$residence,$document,$email,$telephoneNumber,$parentName,$parentSurname,$parentGender,$parentDateOfBirth,$parentBirthNation,$parentBirthPlace,$parentResidence,$parentDocument,$parentEmail,$parentTelephoneNumber)
  {
    parent::__construct($idDatabase,$name,$surname,$gender,$username,$profilePicture,$status,$isAdult,$dateOfBirth,$birthNation,$birthPlace,$residence,$document,$email,$telephoneNumber);

    $this->parentName = $parentName;
    $this->parentSurname = $parentSurname;
    $this->parentGender = $parentGender;
    $this->parentDateOfBirth = $parentDateOfBirth;
    $this->parentBirthNation = $parentBirthNation;
    $this->parentBirthPlace = $parentBirthPlace;

    $this->parentResidence = array(
      'nation' => data_get($parentResidence, 'nation'),
      'cityOfResidence' => data_get($parentResidence, 'cityOfResidence'),
      'cap' => data_get($parentResidence, 'cap'),
      'street' => data_get($parentResidence, 'street'),
      'number' => data_get($parentResidence, 'number')

    );

    $this->parentDocument = array(
        'documentImage' => data_get($parentDocument, 'documentImage'),
        'type' => data_get($parentDocument, 'type'),
        'number' => data_get($parentDocument, 'number'),
        'released' => data_get($parentDocument, 'released'),
        'releaseDate' => data_get($parentDocument, 'releaseDate')
    );


    $this->parentEmail = $parentEmail;
    $this->parentTelephoneNumber = $parentTelephoneNumber;

  }


    /**
     * Get the value of Parent Name
     *
     * @return mixed
     */
    public function getParentName()
    {
        return $this->parentName;
    }

    /**
     * Set the value of Parent Name
     *
     * @param mixed parentName
     *
     * @return self
     */
    public function setParentName($parentName)
    {
        $this->parentName = $parentName;

        return $this;
    }

    /**
     * Get the value of Parent Surname
     *
     * @return mixed
     */
    public function getParentSurname()
    {
        return $this->parentSurname;
    }

    /**
     * Set the value of Parent Surname
     *
     * @param mixed parentSurname
     *
     * @return self
     */
    public function setParentSurname($parentSurname)
    {
        $this->parentSurname = $parentSurname;

        return $this;
    }

    /**
     * Get the value of Parent Gender
     *
     * @return mixed
     */
    public function getParentGender()
    {
        return $this->parentGender;
    }

    /**
     * Set the value of Parent Gender
     *
     * @param mixed parentGender
     *
     * @return self
     */
    public function setParentGender($parentGender)
    {
        $this->parentGender = $parentGender;

        return $this;
    }

    /**
     * Get the value of Parent Date Of Birth
     *
     * @return mixed
     */
    public function getParentDateOfBirth()
    {
        return $this->parentDateOfBirth;
    }

    /**
     * Set the value of Parent Date Of Birth
     *
     * @param mixed parentDateOfBirth
     *
     * @return self
     */
    public function setParentDateOfBirth($parentDateOfBirth)
    {
        $this->parentDateOfBirth = $parentDateOfBirth;

        return $this;
    }

    /**
     * Get the value of Parent Birth Nation
     *
     * @return mixed
     */
    public function getParentBirthNation()
    {
        return $this->parentBirthNation;
    }

    /**
     * Set the value of Parent Birth Nation
     *
     * @param mixed parentBirthNation
     *
     * @return self
     */
    public function setParentBirthNation($parentBirthNation)
    {
        $this->parentBirthNation = $parentBirthNation;

        return $this;
    }

    /**
     * Get the value of Parent Birth Place
     *
     * @return mixed
     */
    public function getParentBirthPlace()
    {
        return $this->parentBirthPlace;
    }

    /**
     * Set the value of Parent Birth Place
     *
     * @param mixed parentBirthPlace
     *
     * @return self
     */
    public function setParentBirthPlace($parentBirthPlace)
    {
        $this->parentBirthPlace = $parentBirthPlace;

        return $this;
    }

    /**
     * Get the value of Parent Residence
     *
     * @return mixed
     */
    public function getParentResidence()
    {
        return $this->parentResidence;
    }

    /**
     * Set the value of Parent Residence
     *
     * @param mixed parentResidence
     *
     * @return self
     */
    public function setParentResidence($parentResidence)
    {
      $this->parentResidence = array(
        'nation' => data_get($parentResidence, 'nation'),
        'cityOfResidence' => data_get($parentResidence, 'cityOfResidence'),
        'cap' => data_get($parentResidence, 'cap'),
        'street' => data_get($parentResidence, 'street'),
        'number' => data_get($parentResidence, 'number')

      ); 
        return $this;
    }

    /**
     * Get the value of Parent Document
     *
     * @return mixed
     */
    public function getParentDocument()
    {
        return $this->parentDocument;
    }

    /**
     * Set the value of Parent Document
     *
     * @param mixed parentDocument
     *
     * @return self
     */
    public function setParentDocument($parentDocument)
    {
      $this->parentDocument = array(
          'documentImage' => data_get($parentDocument, 'documentImage'),
          'type' => data_get($parentDocument, 'type'),
          'number' => data_get($parentDocument, 'number'),
          'released' => data_get($parentDocument, 'released'),
          'releaseDate' => data_get($parentDocument, 'releaseDate')
      );

        return $this;
    }

    /**
     * Get the value of Parent Email
     *
     * @return mixed
     */
    public function getParentEmail()
    {
        return $this->parentEmail;
    }

    /**
     * Set the value of Parent Email
     *
     * @param mixed parentEmail
     *
     * @return self
     */
    public function setParentEmail($parentEmail)
    {
        $this->parentEmail = $parentEmail;

        return $this;
    }

    /**
     * Get the value of Parent Telephone Number
     *
     * @return mixed
     */
    public function getParentTelephoneNumber()
    {
        return $this->parentTelephoneNumber;
    }

    /**
     * Set the value of Parent Telephone Number
     *
     * @param mixed parentTelephoneNumber
     *
     * @return self
     */
    public function setParentTelephoneNumber($parentTelephoneNumber)
    {
        $this->parentTelephoneNumber = $parentTelephoneNumber;

        return $this;
    }

}


 ?>
