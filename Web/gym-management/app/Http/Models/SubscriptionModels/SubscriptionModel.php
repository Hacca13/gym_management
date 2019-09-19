<?php

namespace App\Http\Models\SubscriptionModels;

/**
 *
 */
class SubscriptionModel
{

  protected $idDatabase;
  protected $idUserDatabase;
  protected $status;
  protected $type;

  function __construct($idDatabase,$idUserDatabase,$status,$type)
  {
    $this->idDatabase = $idDatabase;
    $this->idUserDatabase = $idUserDatabase;
    $this->status = $status;
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
