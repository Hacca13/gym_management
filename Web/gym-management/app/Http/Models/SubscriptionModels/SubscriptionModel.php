<?php

namespace App\Http\Models\SubscriptionModels;

/**
 *
 */
abstract class SubscriptionModel {

  protected $idDatabase;
  protected $idUserDatabase;
  protected $isActive;
  protected $type;

  function __construct($idDatabase,$idUserDatabase,$isActive,$type)
  {
    $this->idDatabase = $idDatabase;
    $this->idUserDatabase = $idUserDatabase;
    $this->isActive = $isActive;
    $this->type = $type;
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
     * Get the value of Id User Database
     *
     * @return mixed
     */
    public function getIdUserDatabase()
    {
        return $this->idUserDatabase;
    }

    /**
     * Set the value of Id User Database
     *
     * @param mixed idUserDatabase
     *
     * @return self
     */
    public function setIdUserDatabase($idUserDatabase)
    {
        $this->idUserDatabase = $idUserDatabase;

        return $this;
    }

    /**
     * Get the value of isActive
     *
     * @return mixed
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Set the value of isActive
     *
     * @param mixed isActive
     *
     * @return self
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get the value of Type
     *
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the value of Type
     *
     * @param mixed type
     *
     * @return self
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

}




 ?>
