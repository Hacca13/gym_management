<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google\Cloud\Firestore\FirestoreClient;
use Firevel\Firestore\Facades\Firestore;
use App\Http\Models\MedicalHistoryModel;

class MedicalHistoryManager extends Controller
{
    public static function trasformArrayMedicalHistoryToMedicalHistory($arrayMedicalHistory){
        $idDatabase = data_get($arrayMedicalHistory, 'idDatabase');
        $idUserDatabase = data_get($arrayMedicalHistory, 'idUserDatabase');
        $importantInformation = data_get($arrayMedicalHistory, 'importantInformation');
        $weight = data_get($arrayMedicalHistory, 'weight');
        $height = data_get($arrayMedicalHistory, 'height');
        $imc = data_get($arrayMedicalHistory, 'imc');
        $previousSport = data_get($arrayMedicalHistory, 'previousSport');
        $previousSportTime = data_get($arrayMedicalHistory, 'previousSportTime');
        $inactiveTime = data_get($arrayMedicalHistory, 'inactiveTime');
        $plicometricData = data_get($arrayMedicalHistory, 'plicometricData');
        $hypertrophy = data_get($arrayMedicalHistory, 'hypertrophy');
        $slimming = data_get($arrayMedicalHistory, 'slimming');
        $toning = data_get($arrayMedicalHistory, 'toning');
        $athleticTraining = data_get($arrayMedicalHistory, 'athleticTraining');
        $rehabilitation = data_get($arrayMedicalHistory, 'rehabilitation');
        $combatSports = data_get($arrayMedicalHistory, 'combatSports');
        $otherGoals = data_get($arrayMedicalHistory, 'otherGoals');

        $arrayMedicalHistory = array(


          'importantInformation' => $importantInformation,
          'hypertrophy' => $hypertrophy,

          'toning' => $toning,
          'athleticTraining' => $athleticTraining,
          'rehabilitation' => $rehabilitation,
          'combatSports' => $combatSports,
          'otherGoals' => $otherGoals
        );

      //  $medicalHistory = new MedicalHistoryModel($idDatabase,$idUserDatabase,$importantInformation,$weight,$height,$imc,$previousSport,$previousSportTime,$inactiveTime,$plicometricData,$hypertrophy,$slimming,$toning,$athleticTraining,$rehabilitation,$combatSports,$otherGoals);
        return $arrayMedicalHistory;
    }
    public static function trasformMedicalHistoryToArrayMedicalHistory($medicalHistory){
        $idDatabase = $medicalHistory->getIdDatabase();
        $idUserDatabase = $medicalHistory->getIdUserDatabase();
        $importantInformation = $medicalHistory->getImportantInformation();
        $weight = $medicalHistory->getWeight();
        $height = $medicalHistory->getHeight();
        $imc = $medicalHistory->getImc();
        $previousSport = $medicalHistory->getPreviousSport();
        $previousSportTime = $medicalHistory->getPreviousSportTime();
        $inactiveTime = $medicalHistory->getInactiveTime();
        $plicometricData = $medicalHistory->getPlicometricData();
        $hypertrophy = $medicalHistory->getHypertrophy();
        $slimming = $medicalHistory->getSlimming();
        $toning = $medicalHistory->getToning();
        $athleticTraining = $medicalHistory->getAthleticTraining();
        $rehabilitation = $medicalHistory->getRehabilitation();
        $combatSports = $medicalHistory->getCombatSports();
        $otherGoals = $medicalHistory->getOtherGoals();

        $arrayMedicalHistory = array(
          'idDatabase' => $idDatabase,
          'idUserDatabase' => $idUserDatabase,
          'importantInformation' => $importantInformation,
          'weight' => $weight,
          'height' => $height,
          'imc' => $imc,
          'previousSport' => $previousSport,
          'previousSportTime' => $previousSportTime,
          'inactiveTime' => $inactiveTime,
          'plicometricData' => $plicometricData,
          'hypertrophy' => $hypertrophy,
          'slimming' => $slimming,
          'toning' => $toning,
          'athleticTraining' => $athleticTraining,
          'rehabilitation' => $rehabilitation,
          'combatSports' => $combatSports,
          'otherGoals' => $otherGoals
        );

        return $arrayMedicalHistory;
    }
}
