<?php

/**
 *
 */
class progressCollection
{
  private $idDatabase;
  private $idUserDatabase;
  private $height;
  private $weight;
  private $date;
  private $IMC;

  function __construct($idDatabase,$idUserDatabase,$height,$weight,$date,$IMC)
  {
    $this->idDatabase = $idDatabase;
    $this->idUserDatabase = $idUserDatabase;
    $this->height = $height;
    $this->weight = $weight;
    $this->date = $date;
    $this->IMC = $IMC;
    

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
     * Get the value of Height
     *
     * @return mixed
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Set the value of Height
     *
     * @param mixed height
     *
     * @return self
     */
    public function setHeight($height)
    {
        $this->height = $height;

        return $this;
    }

    /**
     * Get the value of Weight
     *
     * @return mixed
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Set the value of Weight
     *
     * @param mixed weight
     *
     * @return self
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Get the value of Date
     *
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set the value of Date
     *
     * @param mixed date
     *
     * @return self
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get the value of IMC
     *
     * @return mixed
     */
    public function getIMC()
    {
        return $this->IMC;
    }

    /**
     * Set the value of IMC
     *
     * @param mixed IMC
     *
     * @return self
     */
    public function setIMC($IMC)
    {
        $this->IMC = $IMC;

        return $this;
    }

}


 ?>
