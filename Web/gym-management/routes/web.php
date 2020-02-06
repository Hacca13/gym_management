<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::prefix('admin')->group(function () {
  Route::get('/', 'HomeController@index')->middleware();
  Route::get('/home', 'HomeController@index')->name('home')->middleware();
  Route::get('/firetest3','Firetest@test3')->middleware();
  Auth::routes(['register' => false]);
  Route::get('/logout', 'Auth\LoginController@logout')->middleware();

  Route::any('/', 'HomeController@index')->middleware();
});




//ESERCIZI
Route::prefix('admin')->group(function () {
    Route::post('/insertFormExercise', 'ExercisesManager@addExercise')->middleware();
    Route::post('/setFormExercise', 'ExercisesManager@setExercise')->middleware();
    Route::post('/exercisesSearchResultsPage', 'ExercisesManager@searchExercise')->middleware();
    Route::get('/exercisesPageSearchResults', 'ExercisesManager@searchExercise')->middleware();

    Route::get('/gestioneEsercizi', 'ExercisesManager@getAllExercisesForView')->middleware();

    Route::get('/nuovoEsercizio', function () {
        return view('insertNewExercise') ;
    })->middleware();

    Route::get('/modificaEsercizio/{id}', 'ExercisesManager@setExerciseView')->middleware();
    Route::get('/eliminaEsercizio/{id}', 'ExercisesManager@deleteExercise')->middleware();
});

//UTENTI
Route::prefix('admin')->group(function () {
    Route::post('/setUser', 'UsersManager@setUser')->middleware();

    Route::get('/modificaUtente/{id}', 'UsersManager@setUserView')->middleware();

    Route::post('/addUserPost', 'UsersManager@createUser')->middleware();
    Route::post('/userSearchResultsPage', 'UsersManager@searchUsers')->middleware();
    Route::get('/userPageSearchResults', 'UsersManager@searchUsers')->middleware();


    Route::get('/nuovoIscritto', function (){
        return view('insertNewUser');
    })->middleware();


    Route::get('/gestioneIscritti', 'UsersManager@getAllUserForView')->middleware();


});

//ABBONAMENTI
Route::prefix('admin')->group(function () {
    Route::get('/gestioneAbbonamenti', 'SubscriptionManager@getAllSubscriptionForView')->middleware();
    Route::post('/subscriptionSearchResultsPage', 'SubscriptionManager@searchSubscription')->middleware();
    Route::get('/subscriptionPageSearchResults', 'SubscriptionManager@searchSubscription')->middleware();
    Route::get('/nuovoAbbonamento', 'SubscriptionManager@addSubscription')->middleware();
});


//SCHEDA
Route::prefix('admin')->group(function () {
    Route::get('/getTrainingCardsPDFDownloads','TrainingCardsManager@DownloadTrainingCardsPDF')->middleware();
    Route::get('/disattivaScheda/{id}', 'TrainingCardsManager@disabledTrainingCard')->middleware();
    Route::get('/attivaScheda/{id}', 'TrainingCardsManager@activeTrainingCard')->middleware();
    Route::get('/eliminaScheda/{id}', 'TrainingCardsManager@deleteTrainingCard')->middleware();
    Route::get('/gestioneSchede', 'TrainingCardsManager@getAllTrainingCardsForView')->middleware();
    Route::get('/modificaScheda/{id}', 'TrainingCardsManager@TCardPage')->middleware();
    Route::get('/nuovaScheda', 'TrainingCardsManager@exercisePage')->middleware();
    Route::post('/trainingCardsSearchResultsPage', 'TrainingCardsManager@searchTrainingCards')->middleware();
    Route::get('/trainingCardsPageSearchResult', 'TrainingCardsManager@searchTrainingCards')->middleware();
    Route::get('/pdf', function (){
    //    return view('trainingCardPdf') ;
    })->middleware();

});




//CORSI
Route::prefix('admin')->group(function () {
    Route::get('/gestioneCorsi', 'CoursesManager@getAllCoursesView')->middleware();//->middlewaree()

    Route::post('/insertFormCourse', 'CoursesManager@addCourse')->middleware();
    Route::post('/setCourse', 'CoursesManager@setCourse')->middleware();
    Route::get('/nuovoCorso', function () {
        return view('insertNewCourse');
    })->middleware();
    Route::post('/coursesSearchResultsPage', 'CoursesManager@searchCourses')->middleware();
    Route::get('/coursesPageSearchResults', 'CoursesManager@searchCourses')->middleware();

    Route::get('/inserisciUtenteCorso', function () {
        return view('addUserToCourse');
    })->middleware();

    Route::get('/modificaCorso/{id}', 'CoursesManager@setCourseView')->middleware();


});

Route::get('/', function (){
    return view('vetrinaHome');
});
