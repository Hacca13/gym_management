<?php

namespace App\Http\Models;

/**
 *
 */
class MedicalHistoryModel extends AnotherClass
{
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


  function __construct($idDatabase,$idUserDatabase,$importantInformation,$weight,$height,$previousSport,$previousSportTime,$inactiveTime,$plicometricData,$hypertrophy,$slimming,$toning,$athleticTraining,$rehabilitation,$combatSports,$otherGoals)
  {
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
}




?>
