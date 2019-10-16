<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google\Cloud\Firestore\FirestoreClient;
use Kreait\Firebase\Exception\FirebaseException;
use Kreait\Firebase;
use Firevel\Firestore\Facades\Firestore;
use App\Http\Models\ExerciseModel;

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

    public function addExercise(Request $request) {
        $input = $request->all();
        $exerciseImage = $request->file('image');


        $firebase = (new Firebase\Factory());

        $imageRef = $firebase->createStorage()->getBucket()->upload(file_get_contents($exerciseImage),
            [
                'name' => $exerciseImage->getClientOriginalName()
            ])->name();

        $imageDatabase =  "https://firebasestorage.googleapis.com/v0/b/fitandfight.appspot.com/o/". $imageRef ."?alt=media";

        $collection = Firestore::collection('Exercise');


        $id = $collection->add([])->id();
        $exercise = new ExerciseModel(
            $id,
            $input['name'],
            $input['description'],
            $input['exerciseIsATime'],
            $imageDatabase,
            $input['link']
        );

        $collection->document($id)->set(ExercisesManager::trasformExerciseToArrayExercise($exercise));

        toastr()->success('Esercizio inserito');
        return redirect('esercizi');

    }


    public function exercisePage() {
        $exercises = ExercisesManager::getAllExercises();
        return view('exercisePage', compact('exercises'));
    }

}
