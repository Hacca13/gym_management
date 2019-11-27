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
  Route::get('/', 'HomeController@index') ;
  Route::get('/home', 'HomeController@index')->name('home') ;
  Route::get('/firetest3','Firetest@test3') ;
});




//ESERCIZI
Route::prefix('admin')->group(function () {
    Route::post('/insertFormExercise', 'ExercisesManager@addExercise') ;
    Route::post('/setFormExercise', 'ExercisesManager@setExercise') ;
    Route::post('/exercisesSearchResultsPage', 'ExercisesManager@searchExercise') ;
    Route::get('/exercisesPageSearchResults', 'ExercisesManager@searchExercise') ;

    Route::get('/gestioneEsercizi', 'ExercisesManager@getAllExercisesForView') ;

    Route::get('/nuovoEsercizio', function () {
        return view('insertNewExercise') ;
    });

    Route::get('/modificaEsercizio/{id}', 'ExercisesManager@setExerciseView') ;
    Route::get('/eliminaEsercizio/{id}', 'ExercisesManager@deleteExercise') ;
});

//UTENTI
Route::prefix('admin')->group(function () {
    Route::get('/modificaUtente/{id}', 'UsersManager@setUserView') ;
    Route::post('/addUserPost', 'UsersManager@createUser') ;
    Route::post('/userSearchResultsPage', 'UsersManager@searchUsers') ;
    Route::get('/userPageSearchResults', 'UsersManager@searchUsers') ;


    Route::get('/nuovoIscritto', function (){
        return view('insertNewUser');
    }) ;

    Route::get('/gestioneIscritti', 'UsersManager@getAllUserForView') ;

    Route::get('/pdf', function (){
        return view('trainingCardPdf') ;
    });
});

//ABBONAMENTI
Route::prefix('admin')->group(function () {
    Route::get('/gestioneAbbonamenti', 'SubscriptionManager@getAllSubscriptionForView') ;
    Route::post('/subscriptionSearchResultsPage', 'SubscriptionManager@searchSubscription') ;
    Route::get('/subscriptionPageSearchResults', 'SubscriptionManager@searchSubscription') ;
    Route::get('/nuovoAbbonamento', 'SubscriptionManager@addSubscription') ;
});


//SCHEDA
Route::prefix('admin')->group(function () {
    Route::get('/getTrainingCardsPDFDownloads','TrainingCardsManager@DownloadTrainingCardsPDF') ;

    Route::get('/gestioneSchede', 'TrainingCardsManager@getAllTrainingCardsForView') ;

    Route::get('/nuovaScheda', 'TrainingCardsManager@exercisePage') ;
    Route::post('/trainingCardsSearchResultsPage', 'TrainingCardsManager@searchTrainingCards') ;
    Route::get('/trainingCardsPageSearchResult', 'TrainingCardsManager@searchTrainingCards') ;
});




//CORSI
Route::prefix('admin')->group(function () {
    Route::get('/gestioneCorsi', 'CoursesManager@getAllCoursesView') ;//->middlceware('auth')

    Route::post('/insertFormCourse', 'CoursesManager@addCourse') ;
    Route::post('/setCourse', 'CoursesManager@setCourse') ;
    Route::get('/nuovoCorso', function () {
        return view('insertNewCourse');
    }) ;
    Route::post('/coursesSearchResultsPage', 'CoursesManager@searchCourses') ;
    Route::get('/coursesPageSearchResults', 'CoursesManager@searchCourses') ;

    Route::get('/inserisciUtenteCorso', function () {
        return view('addUserToCourse');
    }) ;

    Route::get('/modificaCorso/{id}', 'CoursesManager@setCourseView') ;

    Auth::routes();
});
