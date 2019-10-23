<?php

namespace App\Http\Controllers;

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
            $exercise->setIdDatabase($document->id());
            array_push($arrayExercises,$exercise);
        }
        return $arrayExercises;

    }

    public static function getExerciseByName($name){
        $exercises = array();
        $collection = Firestore::collection('Exercises');
        $query = $collection->where('name', '=' ,$name);
        $documents = $query->documents();

        foreach ($documents as $document) {
          $exercise = ExercisesManager::trasformArrayExerciseToExercise($document->data());
          $exercise->setIdDatabase($document->id());
          array_push($exercises,$exercise);
        }

        return $exercises;
    }

    public static function getExerciseById($idDatabase){
        $collection = Firestore::collection('Exercises');
        $document = $collection->document($idDatabase)->snapshot()->data();
        $document = ExercisesManager::trasformArrayExerciseToExercise($document);
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
        $name = $input['nameExercise'];

        if(ExercisesManager::existsAExerciseWithThisName($name)){
          toastr()->error('Esiste già un esercizio con questo nome');
          return redirect('nuovoEsercizio');
        }

        $exerciseImage = $request->file('imageExercise');

        if(isset($input['exerciseIsATime']) == FALSE){
          $input['exerciseIsATime'] = FALSE;
        }
        else{
          $input['exerciseIsATime'] = TRUE;
        }

        $firebase = (new Firebase\Factory());

        $imageRef = $firebase->createStorage()->getBucket()->upload(file_get_contents($exerciseImage),
            [
                'name' => $exerciseImage->getClientOriginalName()
            ])->name();

        $gif =  "https://firebasestorage.googleapis.com/v0/b/fitandfight.appspot.com/o/". $imageRef ."?alt=media";

        $collection = Firestore::collection('Exercises');

        $arrayExercise = ExercisesManager::trasformRequestIntoArrayExercise($input,$gif);

        $collection->add($arrayExercise);

        toastr()->success('Esercizio inserito');
        return redirect('gestioneEsercizi');

    }

    public function trasformRequestIntoArrayExercise($input,$gif){

      $arrayExercise = array(
          'name' => $input['nameExercise'],
          'description' => $input['descriptionExercise'],
          'exerciseIsATime' => $input['exerciseIsATime'],
          'gif' => $gif,
          'link' => $input['linkExercise']
      );

      return $arrayExercise;
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

}
