<?php

namespace App\Http\Models;
/**
 *
 */
class ProgressCollectionModel
{
  private $idDatabase;
  private $idUserDatabase;
  private $progress;
  /*
    array:
      $progress:
        $progress1:
            $IMC;
            $date;
            $height;
            $weight;
        $progress2:
            $IMC;
            $date;
            $height;
            $weight;
  */


  function __construct($idDatabase,$idUserDatabase,$progress){

    $this->idDatabase = $idDatabase;
    $this->idUserDatabase = $idUserDatabase;

    $this->progress = array();
    foreach ($progress as $progres) {
      array_push($this->progress, $progres);
    }
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
     * Get the value of Progress
     *
     * @return mixed
     */
    public function getProgress()
    {
        return $this->progress;
    }

    /**
     * Set the value of Progress
     *
     * @param mixed progress
     *
     * @return self
     */
    public function setProgress($progress)
    {
        $this->progress = $progress;

        return $this;
    }

}


 ?>
