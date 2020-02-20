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
  Route::get('/', 'HomeController@index')->middleware('auth');
  Route::get('/home', 'HomeController@index')->middleware('auth');
//  Route::get('/firetest3','Firetest@test3')->middleware('auth');
  Auth::routes(['register' => false]);
  Route::get('/logout', 'Auth\LoginController@logout')->middleware('auth');

  Route::any('/', 'HomeController@index')->middleware('auth');
});




//ESERCIZI
Route::prefix('admin')->group(function () {
    Route::post('/insertFormExercise', 'ExercisesManager@addExercise')->middleware('auth');
    Route::post('/setFormExercise', 'ExercisesManager@setExercise')->middleware('auth');
    Route::post('/exercisesSearchResultsPage', 'ExercisesManager@searchExercise')->middleware('auth');
    Route::get('/exercisesPageSearchResults', 'ExercisesManager@searchExercise')->middleware('auth');

    Route::get('/gestioneEsercizi', 'ExercisesManager@getAllExercisesForView')->middleware('auth');

    Route::get('/nuovoEsercizio', function () {
        return view('insertNewExercise');
    })->middleware('auth');

    Route::get('/modificaEsercizio/{id}', 'ExercisesManager@setExerciseView')->middleware('auth');
    Route::get('/eliminaEsercizio/{id}', 'ExercisesManager@deleteExercise')->middleware('auth');
});

//UTENTI
Route::prefix('admin')->group(function () {
    Route::post('/setUser', 'UsersManager@setUser')->middleware('auth');
    Route::get('/modificaUtente/{id}', 'UsersManager@setUserView')->middleware('auth');
    Route::get('/attivaUtente/{id}', 'UsersManager@activeUser')->middleware('auth');
    Route::get('/disattivaUtente/{id}', 'UsersManager@deactivateUser')->middleware('auth');
    Route::post('/addUserPost', 'UsersManager@createUser')->middleware('auth');
    Route::get('/userSearchByPublicSocialResultsPage/{input}', 'UsersManager@searchUsersByPublicSocial')->middleware('auth');
    Route::get('/userSearchByCertificateResultsPage/{input}', 'UsersManager@searchUsersByCertificate')->middleware('auth');
    Route::post('/userSearchResultsPage', 'UsersManager@searchUsers')->middleware('auth');
    Route::get('/userPageSearchResults', 'UsersManager@searchUsers')->middleware('auth');


    Route::get('/nuovoIscritto', function (){
        return view('insertNewUser');
    })->middleware('auth');


    Route::get('/gestioneIscritti', 'UsersManager@getAllUserForView')->middleware('auth');


});

//ABBONAMENTI
Route::prefix('admin')->group(function () {
    Route::get('/gestioneAbbonamenti', 'SubscriptionManager@getAllSubscriptionForView')->middleware('auth');
    Route::post('/subscriptionSearchResultsPage', 'SubscriptionManager@searchSubscription')->middleware('auth');
    Route::get('/subscriptionPageSearchResults', 'SubscriptionManager@searchSubscription')->middleware('auth');
    Route::get('/nuovoAbbonamento', 'SubscriptionManager@addSubscription')->middleware('auth');
    Route::get('/modificaAbbonamenti/{id}', 'SubscriptionManager@updateSubsView')->middleware('auth');
    Route::get('/incrementEntrance/{id}', 'SubscriptionManager@incrementEntrances')->middleware('auth');
    Route::get('/decrementEntrance/{id}', 'SubscriptionManager@decrementEntrances')->middleware('auth');
});


//SCHEDA
Route::prefix('admin')->group(function () {
    Route::get('/getTrainingCardsPDFDownloads','TrainingCardsManager@DownloadTrainingCardsPDF')->middleware('auth');
    Route::get('/disattivaScheda/{id}', 'TrainingCardsManager@disabledTrainingCard')->middleware('auth');
    Route::get('/attivaScheda/{id}', 'TrainingCardsManager@activeTrainingCard')->middleware('auth');
    Route::get('/eliminaScheda/{id}', 'TrainingCardsManager@deleteTrainingCard')->middleware('auth');
    Route::get('/gestioneSchede', 'TrainingCardsManager@getAllTrainingCardsForView')->middleware('auth');
    Route::get('/modificaScheda/{id}', 'TrainingCardsManager@TCardPage')->middleware('auth');
    Route::get('/nuovaScheda', 'TrainingCardsManager@exercisePage')->middleware('auth');
    Route::post('/trainingCardsSearchResultsPage', 'TrainingCardsManager@searchTrainingCards')->middleware('auth');
    Route::get('/trainingCardsPageSearchResult', 'TrainingCardsManager@searchTrainingCards')->middleware('auth');
    Route::get('/pdf', function (){
    //    return view('trainingCardPdf')->middleware('auth ;
    });

});




//CORSI
Route::prefix('admin')->group(function () {
    Route::get('/gestioneCorsi', 'CoursesManager@getAllCoursesView')->middleware('auth');//->middlewaree('auth');

    Route::post('/insertFormCourse', 'CoursesManager@addCourse')->middleware('auth');
    Route::post('/setCourse', 'CoursesManager@setCourse')->middleware('auth');
    Route::get('/nuovoCorso', function () {
        return view('insertNewCourse');
    })->middleware('auth');
    Route::post('/coursesSearchResultsPage', 'CoursesManager@searchCourses')->middleware('auth');
    Route::get('/coursesPageSearchResults', 'CoursesManager@searchCourses')->middleware('auth');

    Route::get('/inserisciUtenteCorso', function () {
        return view('addUserToCourse');
    })->middleware('auth');

    Route::get('/modificaCorso/{id}', 'CoursesManager@setCourseView')->middleware('auth');


});

Route::get('/', function (){
    return view('vetrinaHome');
});
