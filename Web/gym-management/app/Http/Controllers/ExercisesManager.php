<?php

namespace App\Http\Controllers;

use App\Http\Models\TrainingCardsModel;
use DateTime;
use Illuminate\Http\Request;
use Google\Cloud\Firestore\FirestoreClient;
use Kreait\Firebase\Exception\FirebaseException;
use Kreait\Firebase;
use Firevel\Firestore\Facades\Firestore;
use App\Http\Models\ExerciseModel;
use Illuminate\Pagination\LengthAwarePaginator;


class ExercisesManager extends Controller{

    public static function getAllExercises(){
        $arrayExercises = array();
        $collection = Firestore::collection('Exercises');
        $documents = $collection->documents();
        foreach ($documents as $document) {
            $exercise = ExercisesManager::trasformArrayExerciseToExercise($document->data());
            $exercise->setName(ucfirst($exercise->getName()));
            $exercise->setIdDatabase($document->id());
            array_push($arrayExercises,$exercise);
        }
        return $arrayExercises;

    }

    public static function deleteExercise($id){
      $collection = Firestore::collection('Exercises');
      $collection->document($id)->delete();
      TrainingCardsManager::deleteExerciseFromTrainingCard($id);
      toastr()->error('Esercizio Eliminato');
      return redirect('gestioneEsercizi');
    }

    public static function setExerciseView($id,Request $request){
        $documents = $request->session()->pull('exercises');
        $request->session()->put('exercises', $documents);

        foreach ($documents as $document) {
          if($id == $document->getIdDatabase()){
            $exercise = $document;
          }
        }
        return view('setExercise', compact('exercise'));
    }

    public static function setExercise(Request $request){
      $input=$request->all();

      if(!isset($input['exerciseIsATime'])){
        $input['exerciseIsATime'] = false;
      }

      if(isset($input['imageExercise'])){
        $exerciseImage = $request->file('imageExercise');


        $firebase = (new Firebase\Factory());

        $imageRef = $firebase->createStorage()->getBucket()->upload(file_get_contents($exerciseImage),
            [
                'name' => str_replace(' ','-',$input['nameExercise']).'-gif'
            ])->name();

        $gif =  "https://firebasestorage.googleapis.com/v0/b/fitandfight.appspot.com/o/". $imageRef ."?alt=media";


        $arrayExercise = ExercisesManager::trasformRequestToArrayExercise($input,$gif);
        unset($arrayExercise['idDatabase']);
      }else {
        $arrayExercise = ExercisesManager::trasformRequestToArrayExercise($input,$input['oldImageExercise']);
        unset($arrayExercise['idDatabase']);
      }

      $collection = Firestore::collection('Exercises');
      $collection->document($input['idDatabase'])->set($arrayExercise);

      toastr()->success('Esercizio Modificato');
      return redirect('gestioneEsercizi');
    }


    public static function getExerciseByName($name){
        $exercises = array();
        $name = strtolower($name);
        $collection = Firestore::collection('Exercises');
        $query = $collection->where('name', '=' ,$name);
        $documents = $query->documents();

        foreach ($documents as $document) {
            $exercise = ExercisesManager::trasformArrayExerciseToExercise($document->data());
            $exercise->setName(ucfirst($exercise->getName()));
            $exercise->setIdDatabase($document->id());
            array_push($exercises,$exercise);
        }

        return $exercises;
    }

    public static function getExerciseById($idDatabase){
        $collection = Firestore::collection('Exercises');
        $document = $collection->document($idDatabase)->snapshot()->data();
        $document = ExercisesManager::trasformArrayExerciseToExercise($document);
        $document->setName(ucfirst($document->getName()));
        $document->setIdDatabase($idDatabase);
        return $document;
    }

    public static function trasformArrayExerciseToExercise($arrayExercise){
        $idDatabase = data_get($arrayExercise, 'idDatabase');
        $name = data_get($arrayExercise, 'name');
        $description = data_get($arrayExercise, 'description');
        $exerciseIsATime = data_get($arrayExercise, 'exerciseIsATime');
        $gif = data_get($arrayExercise, 'gif');
        $link = data_get($arrayExercise, 'link');

        $exercise = new ExerciseModel($idDatabase,$name,$description,$exerciseIsATime,$gif,$link);

        return $exercise;
    }

    public static function trasformExerciseToArrayExercise($exercise){
        $idDatabase = $exercise->getIdDatabase();
        $name = $exercise->getName();
        $description = $exercise->getDescription();
        $exerciseIsATime = $exercise->getExerciseIsATime();
        $gif = $exercise->getGif();
        $link = $exercise->getLink();

        $arrayExercise = array(
            'idDatabase' => $idDatabase,
            'name' => $name,
            'description' => $description,
            'exerciseIsATime' => $exerciseIsATime,
            'gif' => $gif,
            'link' => $link
        );

        return $arrayExercise;
    }

    public static function existsAExerciseWithThisName($name){
        $exercisesList = ExercisesManager::getExerciseByName($name);
        if(count($exercisesList) == 0){
            return FALSE;
        }else{
            return TRUE;
        }

    }

    public static function addExercise(Request $request) {
        $input = $request->all();
        $input['nameExercise'] = strtolower($input['nameExercise']);
        $name = $input['nameExercise'];

        if(!isset($input['exerciseIsATime'])){
          $input['exerciseIsATime'] = false;
        }

        if(ExercisesManager::existsAExerciseWithThisName($name)){
            toastr()->error('Esiste già un esercizio con questo nome');
            // return redirect('nuovoEsercizio');
        }

        $exerciseImage = $request->file('imageExercise');


        $firebase = (new Firebase\Factory());

        $imageRef = $firebase->createStorage()->getBucket()->upload(file_get_contents($exerciseImage),
            [
                'name' => $exerciseImage->getClientOriginalName(),
            ]);

         $external = "19/10/2100 14:48:21";
         $format = "d/m/Y H:i:s";
         $dateobj = DateTime::createFromFormat($format, $external);

        $gif = $imageRef->signedUrl($dateobj).PHP_EOL;

        $collection = Firestore::collection('Exercises');

        $exercise = ExercisesManager::trasformRequestToArrayExercise($input,$gif);
        $collection->add($exercise);

        toastr()->success('Esercizio inserito');
        return redirect('gestioneEsercizi');

    }

    public static function gif(Request $request){
        $input = $request->all();
        $exerciseImage = $request->file('imageExercise');

        $firebase = (new Firebase\Factory());

        $imageRef = $firebase->createStorage()->getBucket()->upload(file_get_contents($exerciseImage),
            [
                'name' => $exerciseImage->getClientOriginalName()
            ]);

        //$gif =  "https://firebasestorage.googleapis.com/v0/b/fitandfight.appspot.com/o/". $imageRef ."?alt=media";

        $pelo = $imageRef->info()['mediaLink'];

        return redirect('testGif')->with('pelo',  $pelo);

    }



    public static function trasformRequestToArrayExercise($input,$gif){
        $arrayExercise = array(
            'name' => $input['nameExercise'],
            'description' => $input['descriptionExercise'],
            'exerciseIsATime' => $input['exerciseIsATime'],
            'gif' => $gif,
            'link' => $input['linkExercise']
        );

        return $arrayExercise;
    }


    public function exercisePage() {
        $exercises = ExercisesManager::getAllExercises();
        return view('exercisePage', compact('exercises'));

    }

    public function jsonEx()
    {
        $exercises = ExercisesManager::getAllExercises();
        $arr = [];
        foreach ($exercises as $ex) {
            array_push($arr, ExercisesManager::trasformExerciseToArrayExercise($ex));
        }
        return response()->json($arr);
    }

    public function jsonUsr()
    {
        $users = UsersManager::getAllUser();
        $arr = [];
        foreach ($users as $usr) {
            array_push($arr, UsersManager::transformUserIntoArrayUser($usr));
        }
        return response()->json($arr);
    }

    public static function getAllExercisesForView(Request $request) {
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $exercises = ExercisesManager::getExercisesDBOrExercises($request,$currentPage);

        $itemCollection = collect($exercises);
        $perPage = 9;
        $currentPageItems = $itemCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
        $exercises = new LengthAwarePaginator($currentPageItems , count($itemCollection), $perPage);
        $exercises->setPath($request->url());

        return view('exercisePage', compact('exercises'));
    }

    public static function getExercisesDBOrExercises(Request $request,$currentPage){
        if($currentPage == 1){
            $documents = ExercisesManager::getAllExercises();
            $request->session()->put('exercises', $documents);

        }
        else{
            $documents = $request->session()->pull('exercises');
            $request->session()->put('exercises', $documents);
        }
        return $documents;
    }

    public static function searchExercise(Request $request){
        $currentPage = LengthAwarePaginator::resolveCurrentPage();

        $input = $request->all();
        $input['searchInput'] = strtolower($input['searchInput']);

        if(isset($input['searchInput'])){
            $input = $input['searchInput'];
            $request->session()->put('searchInput', $input);
        }else{
            $input = $request->session()->pull('searchInput');
            $request->session()->put('searchInput', $input);
        }

        $url = substr($request->url(), 0, strlen($request->url())-26);
        $url = $url.'exercisesPageSearchResults';

        $exercisesResultList = ExercisesManager::getExercisesDBOrExercisesSessionForSearchPage($request,$currentPage,$input);

        $itemCollection = collect($exercisesResultList);
        $perPage = 9;
        $currentPageItems = $itemCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
        $exercisesResultList = new LengthAwarePaginator($currentPageItems , count($itemCollection), $perPage);
        $exercisesResultList->setPath($url);


        return view('exercisesPageSearchResult', compact('exercisesResultList'));
    }

    public static function getExercisesDBOrExercisesSessionForSearchPage($request,$currentPage,$input){
        if($currentPage == 1){
            $exerciseResultList = ExercisesManager::searchExercisesPartially($input);
            $request->session()->put('exerciseResultList', $exerciseResultList);
        }
        else{
            $exerciseResultList = $request->session()->pull('exerciseResultList');
            $request->session()->put('exerciseResultList', $exerciseResultList);
        }
        return $exerciseResultList;
    }

    public static function searchExercisesPartially($input){
        $exercisesResultList = array();
        $input = strtolower($input);
        $collection = Firestore::collection('Exercises');
        $documents = $collection->orderBy('name')->startAt([$input])->endAt([$input.'z'])->documents();

        foreach ($documents as $document) {
            $exercise = ExercisesManager::trasformArrayExerciseToExercise($document->data());
            $exercise->setIdDatabase($document->id());
            array_push($exercisesResultList,$exercise);
        }

        return $exercisesResultList;

    }

}
