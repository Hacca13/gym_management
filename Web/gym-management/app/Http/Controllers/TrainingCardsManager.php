<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google\Cloud\Firestore\FirestoreClient;
use Firevel\Firestore\Facades\Firestore;
use App\Http\Models\TrainingCardsModel;
use Illuminate\Pagination\LengthAwarePaginator;

class TrainingCardsManager extends Controller
{
    public static function searchTrainingCards(Request $request){
      $input = $request->all();

      if(isset($input['searchInput'])){
        $input = $input['searchInput'];
        $request->session()->put('searchInput', $input);
      }else{
        $input = $request->session()->pull('searchInput');
        $request->session()->put('searchInput', $input);
      }
      $usersList = UsersManager::searchUsersPartially($input);
      $trainingCardsResultList = array();

      foreach ($usersList  as $user) {
          $trainingCards = TrainingCardsManager::getTrainingCardsByUser($user->getIdDatabase());
          foreach ($trainingCards  as $trainingCard) {
              array_push($trainingCardsResultList,$trainingCard );
          }
      }

      return view('trainingCardsPageSearchResult', compact('trainingCardsResultList', 'usersList'));
    }


  /*<div>
        {{ $trainingCardsResultList->links()}}
  </div>*/
  public static function getTrainingCardsByUser($idUserDatabase){
    $trainingCardsList = array();
    $collection = Firestore::collection('TrainingCards');
    $query = $collection->where('idUserDatabase', '=', $idUserDatabase);
    $documents = $query->documents();

    foreach ($documents as $document) {
      $trainingCard = TrainingCardsManager::transformArrayTrainingCardsIntoTrainingCards($document->data());
      $trainingCard->setIdDatabase($document->id());
      array_push( $trainingCardsList, $trainingCard);
    }

    return $trainingCardsList;
  }

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
      $usersList = array();
      $trainingCardsList = TrainingCardsManager::getAllTrainingCards();
      $itemCollection = collect($trainingCardsList);
      $perPage = 1;
      $currentPageItems = $itemCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
      $trainingCardsList= new LengthAwarePaginator($currentPageItems , count($itemCollection), $perPage);
      $trainingCardsList->setPath($request->url());

      foreach ($trainingCardsList as $trainingCard) {
        $user = UsersManager::getUserById($trainingCard->getIdUserDatabase());
        array_push($usersList,$user);
      }

      return view('trainingCardPage', compact('trainingCardsList', 'usersList'));
    }

    public static function getTrainingCardsDBOrTrainingCardsSession(Request $request,$currentPage){
      if($currentPage == 1){
        $documents = TrainingCards::getAllTrainingCards();
        $request->session()->put('trainingCardsList', $documents);

      }
      else{
        $documents = $request->session()->pull('trainingCardsList');
        $request->session()->put('trainingCardsList', $documents);
      }
      return $documents;
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
