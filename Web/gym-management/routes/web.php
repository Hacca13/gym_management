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

Route::get('/', function () {
    return view('index');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/firetest', 'Firetest@test');
Route::get('/firetest2', 'Firetest@test2');
Route::get('/firetest3', 'Firetest@test3');


//ESERCIZI
//Route::get('/esercizi', 'ExercisesManager@exercisePage');
Route::post('/insertFormExercise', 'ExercisesManager@addExercise');

Route::get('/gestioneEsercizi', 'ExercisesManager@getAllExercisesForView');

Route::get('/nuovoEsercizio', function () {
    return view('insertNewExercise');
});

Route::get('/modificaEsercizio', function (){
    return view('changeEx');
});


//UTENTI
Route::post('/addUserPost', 'UsersManager@createUser');
Route::post('/userSearchResultsPage', 'UsersManager@searchUsers');
Route::get('/userPageSearchResults', 'UsersManager@searchUsers');


Route::get('/nuovoIscritto', function (){
    return view('insertNewUser');
});

Route::get('/gestioneIscritti', 'UsersManager@getAllUserForView');

Route::get('/pdf', function (){
    return view('pdf');
});

//ABBONAMENTI
Route::get('/gestioneAbbonamenti', 'SubscriptionManager@getAllSubscriptionForView');

Route::get('/newSubscription', 'SubscriptionManager@addSubscription');

Route::get('/nuovoAbbonamento', function (){
    return view('insertNewSubscription');
});





//SCHEDA


Route::get('/gestioneSchede', 'TrainingCardsManager@getAllTrainingCardsForView');

Route::get('/nuovaScheda', 'TrainingCardsManager@exercisePage');
Route::post('/trainingCardsSearchResultsPage', 'TrainingCardsManager@searchTrainingCards');
Route::get('/trainingCardsPageSearchResult', 'TrainingCardsManager@searchTrainingCards');





//CORSI
Route::get('/gestioneCorsi', 'CoursesManager@getAllCoursesView');//->middleware('auth')
Route::post('/insertFormCourse', 'CoursesManager@addCourse');
Route::get('/nuovoCorso', function () {
    return view('insertNewCourse');
});
Route::post('/coursesSearchResultsPage', 'CoursesManager@searchCourses');
Route::get('/coursesPageSearchResults', 'CoursesManager@searchCourses');



Auth::routes();
