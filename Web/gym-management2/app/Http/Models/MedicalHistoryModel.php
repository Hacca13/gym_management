<?php

namespace App\Http\Models;

/**
 *
 */
class MedicalHistoryModel{

  private $idDatabase;
  private $idUserDatabase;
  private $importantInformation;
  private $weight;
  private $height;
  private $imc;
  private $previousSport;
  private $previousSportTime;
  private $inactiveTime;
  private $plicometricData;
  private $hypertrophy;
  private $slimming;
  private $toning;
  private $athleticTraining;
  private $rehabilitation;
  private $combatSports;
  private $otherGoals;


  function __construct($idDatabase,$idUserDatabase,$importantInformation,$weight,$height,$previousSport,$previousSportTime,$inactiveTime,$plicometricData,$hypertrophy,$slimming,$toning,$athleticTraining,$rehabilitation,$combatSports,$otherGoals){
    
    $this->idDatabase = $idDatabase;
    $this->idUserDatabase = $idUserDatabase;
    $this->importantInformation = $importantInformation;
    $this->weight = $weight;
    $this->height = $height;
    $this->previousSport = $previousSport;
    $this->previousSportTime = $previousSportTime;
    $this->inactiveTime = $inactiveTime;
    $this->plicometricData = $plicometricData;
    $this->hypertrophy = $hypertrophy;
    $this->slimming = $slimming;
    $this->toning = $toning;
    $this->athleticTraining = $athleticTraining;
    $this->rehabilitation = $rehabilitation;
    $this->combatSports = $combatSports;
    $this->otherGoals = $otherGoals;
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
     * Get the value of Important Information
     *
     * @return mixed
     */
    public function getImportantInformation()
    {
        return $this->importantInformation;
    }

    /**
     * Set the value of Important Information
     *
     * @param mixed importantInformation
     *
     * @return self
     */
    public function setImportantInformation($importantInformation)
    {
        $this->importantInformation = $importantInformation;

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
     * Get the value of Imc
     *
     * @return mixed
     */
    public function getImc()
    {
        return $this->imc;
    }

    /**
     * Set the value of Imc
     *
     * @param mixed imc
     *
     * @return self
     */
    public function setImc($imc)
    {
        $this->imc = $imc;

        return $this;
    }

    /**
     * Get the value of Previous Sport
     *
     * @return mixed
     */
    public function getPreviousSport()
    {
        return $this->previousSport;
    }

    /**
     * Set the value of Previous Sport
     *
     * @param mixed previousSport
     *
     * @return self
     */
    public function setPreviousSport($previousSport)
    {
        $this->previousSport = $previousSport;

        return $this;
    }

    /**
     * Get the value of Previous Sport Time
     *
     * @return mixed
     */
    public function getPreviousSportTime()
    {
        return $this->previousSportTime;
    }

    /**
     * Set the value of Previous Sport Time
     *
     * @param mixed previousSportTime
     *
     * @return self
     */
    public function setPreviousSportTime($previousSportTime)
    {
        $this->previousSportTime = $previousSportTime;

        return $this;
    }

    /**
     * Get the value of Inactive Time
     *
     * @return mixed
     */
    public function getInactiveTime()
    {
        return $this->inactiveTime;
    }

    /**
     * Set the value of Inactive Time
     *
     * @param mixed inactiveTime
     *
     * @return self
     */
    public function setInactiveTime($inactiveTime)
    {
        $this->inactiveTime = $inactiveTime;

        return $this;
    }

    /**
     * Get the value of Plicometric Data
     *
     * @return mixed
     */
    public function getPlicometricData()
    {
        return $this->plicometricData;
    }

    /**
     * Set the value of Plicometric Data
     *
     * @param mixed plicometricData
     *
     * @return self
     */
    public function setPlicometricData($plicometricData)
    {
        $this->plicometricData = $plicometricData;

        return $this;
    }

    /**
     * Get the value of Hypertrophy
     *
     * @return mixed
     */
    public function getHypertrophy()
    {
        return $this->hypertrophy;
    }

    /**
     * Set the value of Hypertrophy
     *
     * @param mixed hypertrophy
     *
     * @return self
     */
    public function setHypertrophy($hypertrophy)
    {
        $this->hypertrophy = $hypertrophy;

        return $this;
    }

    /**
     * Get the value of Slimming
     *
     * @return mixed
     */
    public function getSlimming()
    {
        return $this->slimming;
    }

    /**
     * Set the value of Slimming
     *
     * @param mixed slimming
     *
     * @return self
     */
    public function setSlimming($slimming)
    {
        $this->slimming = $slimming;

        return $this;
    }

    /**
     * Get the value of Toning
     *
     * @return mixed
     */
    public function getToning()
    {
        return $this->toning;
    }

    /**
     * Set the value of Toning
     *
     * @param mixed toning
     *
     * @return self
     */
    public function setToning($toning)
    {
        $this->toning = $toning;

        return $this;
    }

    /**
     * Get the value of Athletic Training
     *
     * @return mixed
     */
    public function getAthleticTraining()
    {
        return $this->athleticTraining;
    }

    /**
     * Set the value of Athletic Training
     *
     * @param mixed athleticTraining
     *
     * @return self
     */
    public function setAthleticTraining($athleticTraining)
    {
        $this->athleticTraining = $athleticTraining;

        return $this;
    }

    /**
     * Get the value of Rehabilitation
     *
     * @return mixed
     */
    public function getRehabilitation()
    {
        return $this->rehabilitation;
    }

    /**
     * Set the value of Rehabilitation
     *
     * @param mixed rehabilitation
     *
     * @return self
     */
    public function setRehabilitation($rehabilitation)
    {
        $this->rehabilitation = $rehabilitation;

        return $this;
    }

    /**
     * Get the value of Combat Sports
     *
     * @return mixed
     */
    public function getCombatSports()
    {
        return $this->combatSports;
    }

    /**
     * Set the value of Combat Sports
     *
     * @param mixed combatSports
     *
     * @return self
     */
    public function setCombatSports($combatSports)
    {
        $this->combatSports = $combatSports;

        return $this;
    }

    /**
     * Get the value of Other Goals
     *
     * @return mixed
     */
    public function getOtherGoals()
    {
        return $this->otherGoals;
    }

    /**
     * Set the value of Other Goals
     *
     * @param mixed otherGoals
     *
     * @return self
     */
    public function setOtherGoals($otherGoals)
    {
        $this->otherGoals = $otherGoals;

        return $this;
    }

}




?>
