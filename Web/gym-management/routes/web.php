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
  Route::get('/', 'HomeController@index')->middleware('auth'); //Patane
  Route::get('/home', 'HomeController@index')->middleware('auth'); //Patane
//  Route::get('/firetest3','Firetest@test3')->middleware('auth'); //Patane
  Auth::routes(['register' => false]);
  Route::get('/logout', 'Auth\LoginController@logout')->middleware('auth'); //Patane

  Route::any('/', 'HomeController@index')->middleware('auth'); //Patane
});




//ESERCIZI
Route::prefix('admin')->group(function () {
    Route::post('/insertFormExercise', 'ExercisesManager@addExercise')->middleware('auth'); //Patane
    Route::post('/setFormExercise', 'ExercisesManager@setExercise')->middleware('auth'); //Patane
    Route::post('/exercisesSearchResultsPage', 'ExercisesManager@searchExercise')->middleware('auth'); //Patane
    Route::get('/exercisesPageSearchResults', 'ExercisesManager@searchExercise')->middleware('auth'); //Patane

    Route::get('/gestioneEsercizi', 'ExercisesManager@getAllExercisesForView')->middleware('auth'); //Patane

    Route::get('/nuovoEsercizio', function () {
        return view('insertNewExercise');
    })->middleware('auth'); //Patane

    Route::get('/modificaEsercizio/{id}', 'ExercisesManager@setExerciseView')->middleware('auth'); //Patane
    Route::get('/eliminaEsercizio/{id}', 'ExercisesManager@deleteExercise')->middleware('auth'); //Patane
});

//UTENTI
Route::prefix('admin')->group(function () {
    Route::post('/setUser', 'UsersManager@setUser')->middleware('auth'); //Patane
    Route::get('/modificaUtente/{id}', 'UsersManager@setUserView')->middleware('auth'); //Patane
    Route::get('/attivaUtente/{id}', 'UsersManager@activeUser')->middleware('auth'); //Patane
    Route::get('/disattivaUtente/{id}', 'UsersManager@deactivateUser')->middleware('auth'); //Patane
    Route::post('/addUserPost', 'UsersManager@createUser')->middleware('auth'); //Patane
    Route::get('/userSearchByPublicSocialResultsPage/{input}', 'UsersManager@searchUsersByPublicSocial')->middleware('auth'); //Patane
    Route::get('/userSearchByCertificateResultsPage/{input}', 'UsersManager@searchUsersByCertificate')->middleware('auth'); //Patane
    Route::post('/userSearchResultsPage', 'UsersManager@searchUsers')->middleware('auth'); //Patane
    Route::get('/userPageSearchResults', 'UsersManager@searchUsers')->middleware('auth'); //Patane

    Route::get('/nuovoIscritto', function (){
        return view('insertNewUser');
    })->middleware('auth'); //Patane


    Route::get('/gestioneIscritti', 'UsersManager@getAllUserForView')->middleware('auth'); //Patane


});

//ABBONAMENTI
Route::prefix('admin')->group(function () {
    Route::get('/gestioneAbbonamenti', 'SubscriptionManager@getAllSubscriptionForView')->middleware('auth'); //Patane
    Route::post('/subscriptionSearchResultsPage', 'SubscriptionManager@searchSubscription')->middleware('auth'); //Patane
    Route::get('/subscriptionPageSearchResults', 'SubscriptionManager@searchSubscription')->middleware('auth'); //Patane
    Route::get('/nuovoAbbonamento', 'SubscriptionManager@addSubscription')->middleware('auth'); //Patane
    Route::get('/modificaAbbonamenti/{id}', 'SubscriptionManager@updateSubsView')->middleware('auth'); //Patane
    Route::get('/incrementEntrance/{id}', 'SubscriptionManager@incrementEntrances')->middleware('auth'); //Patane
    Route::get('/decrementEntrance/{id}', 'SubscriptionManager@decrementEntrances')->middleware('auth'); //Patane
});


//SCHEDA
Route::prefix('admin')->group(function () {
    Route::get('/getTrainingCardsPDFDownloads','TrainingCardsManager@DownloadTrainingCardsPDF')->middleware('auth'); //Patane
    Route::get('/disattivaScheda/{id}', 'TrainingCardsManager@disabledTrainingCard')->middleware('auth'); //Patane
    Route::get('/attivaScheda/{id}', 'TrainingCardsManager@activeTrainingCard')->middleware('auth'); //Patane
    Route::get('/eliminaScheda/{id}', 'TrainingCardsManager@deleteTrainingCard')->middleware('auth'); //Patane
    Route::get('/gestioneSchede', 'TrainingCardsManager@getAllTrainingCardsForView')->middleware('auth'); //Patane
    Route::get('/modificaScheda/{id}', 'TrainingCardsManager@TCardPage')->middleware('auth'); //Patane
    Route::get('/nuovaScheda', 'TrainingCardsManager@exercisePage')->middleware('auth'); //Patane
    Route::post('/trainingCardsSearchResultsPage', 'TrainingCardsManager@searchTrainingCards')->middleware('auth'); //Patane
    Route::get('/trainingCardsPageSearchResult', 'TrainingCardsManager@searchTrainingCards')->middleware('auth'); //Patane
    Route::get('/deleteAExerciseFromTrainingCard/{idTrainingCard}/{idExerciseDatabase}', 'TrainingCardsManager@deleteAExerciseFromTrainingCard')->middleware('auth'); //Patane
  //  Route::get('/pdf', function (){
    //    return view('trainingCardPdf')->middleware('auth ;
  //  });

});




//CORSI
Route::prefix('admin')->group(function () {
    Route::get('/gestioneCorsi', 'CoursesManager@getAllCoursesView')->middleware('auth'); //Patane//->middlewaree('auth');

    Route::post('/insertFormCourse', 'CoursesManager@addCourse')->middleware('auth'); //Patane
    Route::post('/setCourse', 'CoursesManager@setCourse')->middleware('auth'); //Patane
    Route::get('/nuovoCorso', function () {
        return view('insertNewCourse');
    })->middleware('auth'); //Patane
    Route::post('/coursesSearchResultsPage', 'CoursesManager@searchCourses')->middleware('auth'); //Patane
    Route::get('/coursesPageSearchResults', 'CoursesManager@searchCourses')->middleware('auth'); //Patane

    Route::get('/inserisciUtenteCorso', function () {
        return view('addUserToCourse');
    })->middleware('auth'); //Patane

    Route::get('/modificaCorso/{id}', 'CoursesManager@setCourseView')->middleware('auth'); //Patane


});

Route::get('/', function (){
    return view('vetrinaHome');
});
