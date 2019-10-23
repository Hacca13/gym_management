<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google\Cloud\Firestore\FirestoreClient;
use Firevel\Firestore\Facades\Firestore;
use App\Http\Models\TrainingCardsModel;
use App\Http\Controllers\UsersManager;
use Illuminate\Pagination\LengthAwarePaginator;

class TrainingCardsManager extends Controller
{
    public static function getAllTrainingCards(){
      $allTrainingCards = array();
      $collection = Firestore::collection('TrainingCards');
      $documents = $collection->documents();

      foreach ($documents as $document) {
        $trainingCards = TrainingCardsManager::transformArrayTrainingCardsIntoTrainingCards($document->data());
        $trainingCards->setIdDatabase($document->id());
        array_push($allTrainingCards,$trainingCards);
      }
      return $allTrainingCards;
    }


    public static function getAllTrainingCardsForView(Request $request){
      $currentPage = LengthAwarePaginator::resolveCurrentPage();
      $trainingCards = TrainingCardsManager::getTrainingCardsDBOrTrainingCardsSession($request,$currentPage);
      $listAllUsers = UsersManager::getUserDBOrUserSession($request,$currentPage);
      $usersList = array();

      $itemCollection = collect($trainingCards);
      $perPage = 1;
      $currentPageItems = $itemCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
      $trainingCardsList = new LengthAwarePaginator($currentPageItems , count($itemCollection), $perPage);
      $trainingCardsList->setPath($request->url());

      foreach ($trainingCardsList as $trainingCard) {
        foreach ($listAllUsers as $user) {
          if($trainingCard->getIdUserDatabase() == $user->getIdDatabase()){
            array_push($usersList,$user);
          }
        }
      }


      return view('trainingCardPage', compact('trainingCardsList','usersList'));
    }

    public static function getTrainingCardsDBOrTrainingCardsSession(Request $request,$currentPage){
      if($currentPage == 1){
        $documents = TrainingCardsManager::getAllTrainingCards();
        $request->session()->put('trainingCards', $documents);

      }
      else{
        $documents = $request->session()->pull('trainingCards');
        $request->session()->put('trainingCards', $documents);
      }
      return $documents;
    }



    public static function transformTrainingCardsIntoArrayTrainingCards($trainingCards){
      $idDatabase = $trainingCards->getIdDatabase();
      $idUserDatabase = $trainingCards->getIdUserDatabase();
      $period = $trainingCards->getPeriod();
      $exercises = $trainingCards->getExercises();

      $arrayTrainingCards = array(
        'idDatabase' => $idDatabase,
        'idUserDatabase' => $idUserDatabase,
        'period' => $period,
        'exercises' => $exercises
      );

      return $arrayTrainingCards;
    }

    public static function transformArrayTrainingCardsIntoTrainingCards($arrayTrainingCards){
      $idDatabase = data_get($arrayTrainingCards,'idDatabase');
      $idUserDatabase = data_get($arrayTrainingCards,'idUserDatabase');
      $period = data_get($arrayTrainingCards,'period');
      $exercises = data_get($arrayTrainingCards,'exercises');

      $trainingCards = new TrainingCardsModel($idDatabase,$idUserDatabase,$period,$exercises);

      return $trainingCards;
    }


}
