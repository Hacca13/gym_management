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
  Route::get('/', 'HomeController@index');
  Route::get('/home', 'HomeController@index')->name('home');
  Route::get('/firetest3','Firetest@test3');
  Auth::routes(['register' => false]);
  Route::get('/logout', 'Auth\LoginController@logout');

  Route::any('/', 'HomeController@index');
});




//ESERCIZI
Route::prefix('admin')->group(function () {
    Route::post('/insertFormExercise', 'ExercisesManager@addExercise');
    Route::post('/setFormExercise', 'ExercisesManager@setExercise');
    Route::post('/exercisesSearchResultsPage', 'ExercisesManager@searchExercise');
    Route::get('/exercisesPageSearchResults', 'ExercisesManager@searchExercise');

    Route::get('/gestioneEsercizi', 'ExercisesManager@getAllExercisesForView');

    Route::get('/nuovoEsercizio', function () {
        return view('insertNewExercise') ;
    });

    Route::get('/modificaEsercizio/{id}', 'ExercisesManager@setExerciseView');
    Route::get('/eliminaEsercizio/{id}', 'ExercisesManager@deleteExercise');
});

//UTENTI
Route::prefix('admin')->group(function () {
    Route::post('/setUser', 'UsersManager@setUser');

    Route::get('/modificaUtente/{id}', 'UsersManager@setUserView');
    Route::get('/attivaUtente/{id}', 'UsersManager@activeUser');
    Route::get('/disattivaUtente/{id}', 'UsersManager@deactivateUser');
    Route::post('/addUserPost', 'UsersManager@createUser');
    Route::post('/userSearchResultsPage', 'UsersManager@searchUsers');
    Route::get('/userPageSearchResults', 'UsersManager@searchUsers');


    Route::get('/nuovoIscritto', function (){
        return view('insertNewUser');
    });


    Route::get('/gestioneIscritti', 'UsersManager@getAllUserForView');


});

//ABBONAMENTI
Route::prefix('admin')->group(function () {
    Route::get('/gestioneAbbonamenti', 'SubscriptionManager@getAllSubscriptionForView');
    Route::post('/subscriptionSearchResultsPage', 'SubscriptionManager@searchSubscription');
    Route::get('/subscriptionPageSearchResults', 'SubscriptionManager@searchSubscription');
    Route::get('/nuovoAbbonamento', 'SubscriptionManager@addSubscription');
    Route::get('/modificaAbbonamenti/{id}', 'SubscriptionManager@updateSubsView');
    Route::get('/incrementEntrance/{id}', 'SubscriptionManager@incrementEntrances');
    Route::get('/decrementEntrance/{id}', 'SubscriptionManager@decrementEntrances');
});


//SCHEDA
Route::prefix('admin')->group(function () {
    Route::get('/getTrainingCardsPDFDownloads','TrainingCardsManager@DownloadTrainingCardsPDF');
    Route::get('/disattivaScheda/{id}', 'TrainingCardsManager@disabledTrainingCard');
    Route::get('/attivaScheda/{id}', 'TrainingCardsManager@activeTrainingCard');
    Route::get('/eliminaScheda/{id}', 'TrainingCardsManager@deleteTrainingCard');
    Route::get('/gestioneSchede', 'TrainingCardsManager@getAllTrainingCardsForView');
    Route::get('/modificaScheda/{id}', 'TrainingCardsManager@TCardPage');
    Route::get('/nuovaScheda', 'TrainingCardsManager@exercisePage');
    Route::post('/trainingCardsSearchResultsPage', 'TrainingCardsManager@searchTrainingCards');
    Route::get('/trainingCardsPageSearchResult', 'TrainingCardsManager@searchTrainingCards');
    Route::get('/pdf', function (){
    //    return view('trainingCardPdf') ;
    });

});




//CORSI
Route::prefix('admin')->group(function () {
    Route::get('/gestioneCorsi', 'CoursesManager@getAllCoursesView');//->middlewaree()

    Route::post('/insertFormCourse', 'CoursesManager@addCourse');
    Route::post('/setCourse', 'CoursesManager@setCourse');
    Route::get('/nuovoCorso', function () {
        return view('insertNewCourse');
    });
    Route::post('/coursesSearchResultsPage', 'CoursesManager@searchCourses');
    Route::get('/coursesPageSearchResults', 'CoursesManager@searchCourses');

    Route::get('/inserisciUtenteCorso', function () {
        return view('addUserToCourse');
    });

    Route::get('/modificaCorso/{id}', 'CoursesManager@setCourseView');


});

Route::get('/', function (){
    return view('vetrinaHome');
});
