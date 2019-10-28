<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google\Cloud\Firestore\FirestoreClient;
use Firevel\Firestore\Facades\Firestore;
use App\Http\Models\TrainingCardsModel;

class TrainingCardsManager extends Controller
{
    public static function getAllTrainingCards(){
      $allTrainingCards = array();
      $collection = Firestore::collection('TrainingCards');
      $documents = $collection->documents();
      foreach ($documents as $document) {
        $trainingCards = TrainingCardsManager::transformArrayTrainingCardsIntoTrainingCards($document->data());
        $trainingCards->setIdDatabase($document-id());
        array_push($allTrainingCards,$trainingCards);
      }
      return $allTrainingCards;
    }

    public static function createTrainingCards(Request $request){
      $input = $request->all();
      $collection = Firestore::collection('TrainingCards');

      try {
        $trainingCard = TrainingCardsManager::trasformRequestIntoTrainingCards($input);
        $arrayTrainingCard = TrainingCardsManager::transformTrainingCardsIntoArrayTrainingCards($trainingCard);
        $collection->add($arrayTrainingCard);
        toastr()->success('Scheda inserita con successo.');
        return redirect('/nuovaScheda');

      } catch (FirebaseException $e) {

          toastr()->error($tr->translate($e->getMessage()));
          return redirect('/nuovaScheda');
      }
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

    public function exercisePage() {
        $exercises = ExercisesManager::getAllExercises();
        $users = UsersManager::getAllUser();
        return view('insertNewTCARD', compact('exercises', 'users'));
    }

    public function insertTrainingCard(Request $request) {

        $collection = Firestore::collection('TrainingCards');
        $collection->add($request->all());
        return '/nuovaScheda';
    }



}
