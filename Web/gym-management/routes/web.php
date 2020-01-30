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
  Route::get('/', 'HomeController@index');//Patane
  Route::get('/home', 'HomeController@index')->name('home');//Patane
  Route::get('/firetest3','Firetest@test3');//Patane
  Auth::routes(['register' => false]);
  Route::get('/logout', 'Auth\LoginController@logout');//Patane

  Route::any('/', 'HomeController@index');//Patane
});




//ESERCIZI
Route::prefix('admin')->group(function () {
    Route::post('/insertFormExercise', 'ExercisesManager@addExercise');//Patane
    Route::post('/setFormExercise', 'ExercisesManager@setExercise');//Patane
    Route::post('/exercisesSearchResultsPage', 'ExercisesManager@searchExercise');//Patane
    Route::get('/exercisesPageSearchResults', 'ExercisesManager@searchExercise');//Patane

    Route::get('/gestioneEsercizi', 'ExercisesManager@getAllExercisesForView');//Patane

    Route::get('/nuovoEsercizio', function () {
        return view('insertNewExercise') ;
    });//Patane

    Route::get('/modificaEsercizio/{id}', 'ExercisesManager@setExerciseView');//Patane
    Route::get('/eliminaEsercizio/{id}', 'ExercisesManager@deleteExercise');//Patane
});

//UTENTI
Route::prefix('admin')->group(function () {
    Route::post('/setUser', 'UsersManager@setUser');//Patane

    Route::get('/modificaUtente/{id}', 'UsersManager@setUserView');//Patane

    Route::post('/addUserPost', 'UsersManager@createUser');//Patane
    Route::post('/userSearchResultsPage', 'UsersManager@searchUsers');//Patane
    Route::get('/userPageSearchResults', 'UsersManager@searchUsers');//Patane


    Route::get('/nuovoIscritto', function (){
        return view('insertNewUser');
    });//Patane


    Route::get('/gestioneIscritti', 'UsersManager@getAllUserForView');//Patane


});

//ABBONAMENTI
Route::prefix('admin')->group(function () {
    Route::get('/gestioneAbbonamenti', 'SubscriptionManager@getAllSubscriptionForView');//Patane
    Route::post('/subscriptionSearchResultsPage', 'SubscriptionManager@searchSubscription');//Patane
    Route::get('/subscriptionPageSearchResults', 'SubscriptionManager@searchSubscription');//Patane
    Route::get('/nuovoAbbonamento', 'SubscriptionManager@addSubscription');//Patane
});


//SCHEDA
Route::prefix('admin')->group(function () {
    Route::get('/getTrainingCardsPDFDownloads','TrainingCardsManager@DownloadTrainingCardsPDF');//Patane
    Route::get('/disattivaScheda/{id}', 'TrainingCardsManager@disabledTrainingCard');//Patane
    Route::get('/attivaScheda/{id}', 'TrainingCardsManager@activeTrainingCard');//Patane
    Route::get('/eliminaScheda/{id}', 'TrainingCardsManager@deleteTrainingCard');//Patane
    Route::get('/gestioneSchede', 'TrainingCardsManager@getAllTrainingCardsForView');//Patane
  //  Route::get('/updateTCardView', 'TrainingCardsManager@updateTCardView');//Patane
    Route::get('/nuovaScheda', 'TrainingCardsManager@exercisePage');//Patane
    Route::post('/trainingCardsSearchResultsPage', 'TrainingCardsManager@searchTrainingCards');//Patane
    Route::get('/trainingCardsPageSearchResult', 'TrainingCardsManager@searchTrainingCards');//Patane
    Route::get('/pdf', function (){
    //    return view('trainingCardPdf') ;
    });//Patane

});




//CORSI
Route::prefix('admin')->group(function () {
    Route::get('/gestioneCorsi', 'CoursesManager@getAllCoursesView');//Patane//->middlewaree('auth')

    Route::post('/insertFormCourse', 'CoursesManager@addCourse');//Patane
    Route::post('/setCourse', 'CoursesManager@setCourse');//Patane
    Route::get('/nuovoCorso', function () {
        return view('insertNewCourse');
    });//Patane
    Route::post('/coursesSearchResultsPage', 'CoursesManager@searchCourses');//Patane
    Route::get('/coursesPageSearchResults', 'CoursesManager@searchCourses');//Patane

    Route::get('/inserisciUtenteCorso', function () {
        return view('addUserToCourse');
    });//Patane

    Route::get('/modificaCorso/{id}', 'CoursesManager@setCourseView');//Patane


});

Route::get('/', function (){
    return view('vetrinaHome');
});
