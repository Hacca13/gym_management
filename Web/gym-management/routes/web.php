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
  Route::get('/', 'HomeController@index');//patane;
  Route::get('/home', 'HomeController@index')->name('home');//patane;
  Route::get('/firetest3','Firetest@test3');//patane;
  Auth::routes(['register' => false]);
  Route::get('/logout', 'Auth\LoginController@logout');//patane;

  Route::any('/', 'HomeController@index');//patane;
});




//ESERCIZI
Route::prefix('admin')->group(function () {
    Route::post('/insertFormExercise', 'ExercisesManager@addExercise');//patane;
    Route::post('/setFormExercise', 'ExercisesManager@setExercise');//patane;
    Route::post('/exercisesSearchResultsPage', 'ExercisesManager@searchExercise');//patane;
    Route::get('/exercisesPageSearchResults', 'ExercisesManager@searchExercise');//patane;

    Route::get('/gestioneEsercizi', 'ExercisesManager@getAllExercisesForView');//patane;

    Route::get('/nuovoEsercizio', function () {
        return view('insertNewExercise') ;
    });//patane;

    Route::get('/modificaEsercizio/{id}', 'ExercisesManager@setExerciseView');//patane;
    Route::get('/eliminaEsercizio/{id}', 'ExercisesManager@deleteExercise');//patane;
});

//UTENTI
Route::prefix('admin')->group(function () {
    Route::get('/modificaUtente/{id}', 'UsersManager@setUserView');//patane;
    Route::post('/addUserPost', 'UsersManager@createUser');//patane;
    Route::post('/userSearchResultsPage', 'UsersManager@searchUsers');//patane;
    Route::get('/userPageSearchResults', 'UsersManager@searchUsers');//patane;


    Route::get('/nuovoIscritto', function (){
        return view('insertNewUser');
    });//patane;

    Route::get('/gestioneIscritti', 'UsersManager@getAllUserForView');//patane;

    Route::get('/pdf', function (){
        return view('trainingCardPdf') ;
    });//patane;
});

//ABBONAMENTI
Route::prefix('admin')->group(function () {
    Route::get('/gestioneAbbonamenti', 'SubscriptionManager@getAllSubscriptionForView');//patane;
    Route::post('/subscriptionSearchResultsPage', 'SubscriptionManager@searchSubscription');//patane;
    Route::get('/subscriptionPageSearchResults', 'SubscriptionManager@searchSubscription');//patane;
    Route::get('/nuovoAbbonamento', 'SubscriptionManager@addSubscription');//patane;
});


//SCHEDA
Route::prefix('admin')->group(function () {
    Route::get('/getTrainingCardsPDFDownloads','TrainingCardsManager@DownloadTrainingCardsPDF');//patane;

    Route::get('/gestioneSchede', 'TrainingCardsManager@getAllTrainingCardsForView');//patane;

    Route::get('/nuovaScheda', 'TrainingCardsManager@exercisePage');//patane;
    Route::post('/trainingCardsSearchResultsPage', 'TrainingCardsManager@searchTrainingCards');//patane;
    Route::get('/trainingCardsPageSearchResult', 'TrainingCardsManager@searchTrainingCards');//patane;
});




//CORSI
Route::prefix('admin')->group(function () {
    Route::get('/gestioneCorsi', 'CoursesManager@getAllCoursesView');//patane;//->middlceware('auth')

    Route::post('/insertFormCourse', 'CoursesManager@addCourse');//patane;
    Route::post('/setCourse', 'CoursesManager@setCourse');//patane;
    Route::get('/nuovoCorso', function () {
        return view('insertNewCourse');
    });//patane;
    Route::post('/coursesSearchResultsPage', 'CoursesManager@searchCourses');//patane;
    Route::get('/coursesPageSearchResults', 'CoursesManager@searchCourses');//patane;

    Route::get('/inserisciUtenteCorso', function () {
        return view('addUserToCourse');
    });//patane;

    Route::get('/modificaCorso/{id}', 'CoursesManager@setCourseView');//patane;


});

Route::get('/', function (){
    return view('vetrinaHome');
});
