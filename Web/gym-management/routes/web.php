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
  Route::get('/', 'HomeController@index');//Patane->middleware('auth');
  Route::get('/home', 'HomeController@index');//Patane->middleware('auth');
//  Route::get('/firetest3','Firetest@test3');//Patane->middleware('auth');
  Auth::routes(['register' => false]);
  Route::get('/logout', 'Auth\LoginController@logout');//Patane->middleware('auth');

  Route::any('/', 'HomeController@index');//Patane->middleware('auth');
});




//ESERCIZI
Route::prefix('admin')->group(function () {
    Route::post('/insertFormExercise', 'ExercisesManager@addExercise');//Patane->middleware('auth');
    Route::post('/setFormExercise', 'ExercisesManager@setExercise');//Patane->middleware('auth');
    Route::post('/exercisesSearchResultsPage', 'ExercisesManager@searchExercise');//Patane->middleware('auth');
    Route::get('/exercisesPageSearchResults', 'ExercisesManager@searchExercise');//Patane->middleware('auth');

    Route::get('/gestioneEsercizi', 'ExercisesManager@getAllExercisesForView');//Patane->middleware('auth');

    Route::get('/nuovoEsercizio', function () {
        return view('insertNewExercise');
    });//Patane->middleware('auth');

    Route::get('/modificaEsercizio/{id}', 'ExercisesManager@setExerciseView');//Patane->middleware('auth');
    Route::get('/eliminaEsercizio/{id}', 'ExercisesManager@deleteExercise');//Patane->middleware('auth');
});

//UTENTI
Route::prefix('admin')->group(function () {
    Route::post('/setUser', 'UsersManager@setUser');//Patane->middleware('auth');
    Route::get('/modificaUtente/{id}', 'UsersManager@setUserView');//Patane->middleware('auth');
    Route::get('/attivaUtente/{id}', 'UsersManager@activeUser');//Patane->middleware('auth');
    Route::get('/disattivaUtente/{id}', 'UsersManager@deactivateUser');//Patane->middleware('auth');
    Route::post('/addUserPost', 'UsersManager@createUser');//Patane->middleware('auth');
    Route::get('/userSearchByPublicSocialResultsPage/{input}', 'UsersManager@searchUsersByPublicSocial');//Patane->middleware('auth');
    Route::get('/userSearchByCertificateResultsPage/{input}', 'UsersManager@searchUsersByCertificate');//Patane->middleware('auth');
    Route::post('/userSearchResultsPage', 'UsersManager@searchUsers');//Patane->middleware('auth');
    Route::get('/userPageSearchResults', 'UsersManager@searchUsers');//Patane->middleware('auth');


    Route::get('/nuovoIscritto', function (){
        return view('insertNewUser');
    });//Patane->middleware('auth');


    Route::get('/gestioneIscritti', 'UsersManager@getAllUserForView');//Patane->middleware('auth');


});

//ABBONAMENTI
Route::prefix('admin')->group(function () {
    Route::get('/gestioneAbbonamenti', 'SubscriptionManager@getAllSubscriptionForView');//Patane->middleware('auth');
    Route::post('/subscriptionSearchResultsPage', 'SubscriptionManager@searchSubscription');//Patane->middleware('auth');
    Route::get('/subscriptionPageSearchResults', 'SubscriptionManager@searchSubscription');//Patane->middleware('auth');
    Route::get('/nuovoAbbonamento', 'SubscriptionManager@addSubscription');//Patane->middleware('auth');
    Route::get('/modificaAbbonamenti/{id}', 'SubscriptionManager@updateSubsView');//Patane->middleware('auth');
    Route::get('/incrementEntrance/{id}', 'SubscriptionManager@incrementEntrances');//Patane->middleware('auth');
    Route::get('/decrementEntrance/{id}', 'SubscriptionManager@decrementEntrances');//Patane->middleware('auth');
});


//SCHEDA
Route::prefix('admin')->group(function () {
    Route::get('/getTrainingCardsPDFDownloads','TrainingCardsManager@DownloadTrainingCardsPDF');//Patane->middleware('auth');
    Route::get('/disattivaScheda/{id}', 'TrainingCardsManager@disabledTrainingCard');//Patane->middleware('auth');
    Route::get('/attivaScheda/{id}', 'TrainingCardsManager@activeTrainingCard');//Patane->middleware('auth');
    Route::get('/eliminaScheda/{id}', 'TrainingCardsManager@deleteTrainingCard');//Patane->middleware('auth');
    Route::get('/gestioneSchede', 'TrainingCardsManager@getAllTrainingCardsForView');//Patane->middleware('auth');
    Route::get('/modificaScheda/{id}', 'TrainingCardsManager@TCardPage');//Patane->middleware('auth');
    Route::get('/nuovaScheda', 'TrainingCardsManager@exercisePage');//Patane->middleware('auth');
    Route::post('/trainingCardsSearchResultsPage', 'TrainingCardsManager@searchTrainingCards');//Patane->middleware('auth');
    Route::get('/trainingCardsPageSearchResult', 'TrainingCardsManager@searchTrainingCards');//Patane->middleware('auth');
    Route::get('/pdf', function (){
    //    return view('trainingCardPdf')->middleware('auth ;
    });

});




//CORSI
Route::prefix('admin')->group(function () {
    Route::get('/gestioneCorsi', 'CoursesManager@getAllCoursesView');//Patane->middleware('auth');//->middlewaree('auth');

    Route::post('/insertFormCourse', 'CoursesManager@addCourse');//Patane->middleware('auth');
    Route::post('/setCourse', 'CoursesManager@setCourse');//Patane->middleware('auth');
    Route::get('/nuovoCorso', function () {
        return view('insertNewCourse');
    });//Patane->middleware('auth');
    Route::post('/coursesSearchResultsPage', 'CoursesManager@searchCourses');//Patane->middleware('auth');
    Route::get('/coursesPageSearchResults', 'CoursesManager@searchCourses');//Patane->middleware('auth');

    Route::get('/inserisciUtenteCorso', function () {
        return view('addUserToCourse');
    });//Patane->middleware('auth');

    Route::get('/modificaCorso/{id}', 'CoursesManager@setCourseView');//Patane->middleware('auth');


});

Route::get('/', function (){
    return view('vetrinaHome');
});
