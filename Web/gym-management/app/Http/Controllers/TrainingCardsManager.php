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
      $currentPage = LengthAwarePaginator::resolveCurrentPage();
      $input = $request->all();

      if(isset($input['searchInputTrainingCards'])){
        $input = $input['searchInputTrainingCards'];
        $request->session()->put('searchInputTrainingCards', $input);
      }else{
        $input = $request->session()->pull('searchInputTrainingCards');
        $request->session()->put('searchInputTrainingCards', $input);
      }

      $usersList = TrainingCardsManager::getUsersPartiallyDBOrUsersPartiallySessionForSearchPage($request,$currentPage,$input);
      $trainingCardsResultList = array();

      if($currentPage == 1){
          foreach ($usersList  as $user) {
              $trainingCards = TrainingCardsManager::getTrainingCardsByUser($user->getIdDatabase());
              foreach ($trainingCards  as $trainingCard) {
                  array_push($trainingCardsResultList,$trainingCard );
              }
          }
            $request->session()->put('trainingCardsResultList', $trainingCardsResultList);
      }else{
        $trainingCardsResultList = $request->session()->pull('trainingCardsResultList');
        $request->session()->put('trainingCardsResultList', $trainingCardsResultList);
      }



      $url = substr($request->url(), 0, strlen($request->url())-30);
      $url = $url.'/trainingCardsPageSearchResult';

      $itemCollection = collect($trainingCardsResultList);
      $perPage = 1;
      $currentPageItems = $itemCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
      $trainingCardsResultList= new LengthAwarePaginator($currentPageItems , count($itemCollection), $perPage);
      $trainingCardsResultList->setPath($url);



      return view('trainingCardsPageSearchResult', compact('trainingCardsResultList', 'usersList'));
    }

    public static function getUsersPartiallyDBOrUsersPartiallySessionForSearchPage($request,$currentPage,$input){
      if($currentPage == 1){
        $usersList = UsersManager::searchUsersPartially($input);
        $request->session()->put('usersList', $usersList);
      }
      else{
        $usersList = $request->session()->pull('usersList');
        $request->session()->put('usersList', $usersList);
      }
      return $usersList;
    }


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

      $exerciseListBig = array();
      $exerciseListTemp = array();
      foreach ($trainingCardsList as $trainingCard) {
        $user = UsersManager::getUserById($trainingCard->getIdUserDatabase());
        array_push($usersList,$user);

        foreach ($trainingCard->getExercises() as $exercise) {
          $exercise1 = ExercisesManager::trasformArrayExerciseToExercise($exercise);
          $exercise1->setIdDatabase(data_get($exercise, 'idExerciseDatabase'));
          $exercise1->setExerciseIsATime(data_get($exercise, 'atTime'));
          array_push($exerciseListTemp,$exercise1);
        }

        $arrayTemp['idDatabase'] = $trainingCard->getIdDatabase();
        $arrayTemp['exercises'] = $exerciseListTemp ;

        array_push($exerciseListBig,$arrayTemp);

      }



      return view('trainingCardPage', compact('trainingCardsList', 'usersList', 'exerciseListBig' ));
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
        return view('insertNewTCARD', compact('exercises', 'i'));
    }


    public function exercisePage2() {
        $exercises = ExercisesManager::getAllExercises();
        $users = UsersManager::getAllUser();
        return view('addUserToCourse', compact('exercises', 'users'));
    }

    public function insertTrainingCard(Request $request) {

        $collection = Firestore::collection('TrainingCards');
        $collection->add($request->all());
        return '/nuovaScheda';
    }



}
