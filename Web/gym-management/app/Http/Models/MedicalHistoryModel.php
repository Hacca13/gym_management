<?php

namespace App\Http\Models;

/**
 *
 */
class MedicalHistoryModel extends AnotherClass
{
  $idDatabase;
  $idUserDatabase;
  $importantInformation;
  $weight;
  $height;
  $previousSport;
  $previousSportTime;
  $inactiveTime;
  $plicometricData;
  $hypertrophy;
  $slimming;
  $toning;
  $athleticTraining;
  $rehabilitation;
  $combatSports;
  $otherGoals;


  function __construct($idDatabase,$idUserDatabase,$importantInformation,$weight,$height,$previousSport,$previousSportTime,$inactiveTime,$plicometricData,$hypertrophy,$slimming,$toning,$athleticTraining,$rehabilitation,$combatSports,$otherGoals)
  {
    $this->$idDatabase = $idDatabase;
    $this->$idUserDatabase = $idUserDatabase;
    $this->$importantInformation = $importantInformation;
    $this->$weight = $weight;
    $this->$height = $height;
    $this->$previousSport = $previousSport;
    $this->$previousSportTime = $previousSportTime;
    $this->$inactiveTime = $inactiveTime;
    $this->$plicometricData = $plicometricData;
    $this->$hypertrophy = $hypertrophy;
    $this->$slimming = $slimming;
    $this->$toning = $toning;
    $this->$athleticTraining = $athleticTraining;
    $this->$rehabilitation = $rehabilitation;
    $this->$combatSports = $combatSports;
    $this->$otherGoals = $otherGoals;
  }
}




?>
