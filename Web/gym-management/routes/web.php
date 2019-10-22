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


Route::get('/gestioneEsercizi', function () {
    return view('exercisePage');
});

Route::get('/nuovoEsercizio', function () {
    return view('insertNewExcercise');
});

Route::get('/modificaEsercizio', function (){
    return view('changeEx');
});

Route::get('/nuovaSched', 'TrainingCardsManager@exercisePage');


//UTENTI
Route::get('/getAllUser', 'UserManager@getAllUser');
Route::post('/addUserPost', 'UsersManager@createUser');

Route::get('/nuovoUtente', function (){
    return view('userAdd');
});

Route::get('/gestioneIscritti', function () {
    return view('usersPage');
});




//ABBONAMENTI
Route::get('/gestioneAbbonamenti', function () {
    return view('subscriptionPage');
});

Route::get('/nuovoAbbonamento', function (){
    return view('newSubscription');
});



//SCHEDA
Route::get('/nuovaScheda', function (){
    return view('newCard');
});

Route::get('/gestioneSchede', function () {
    return view('trainingCards');
});



//CORSI
Route::get('/corsi', 'CoursesManager@getAllCourses');
Route::post('/insertFormCourse', 'CoursesManager@addCourse');
Route::get('/gestioneCorsi', 'CoursesManager@coursesPage');

Route::get('/nuovoCorso', function () {
    return view('insertNewCourse');
});

Auth::routes();

Route::get('/provaa', function (){
    return view('viewStrap');
});

Route::get('/insertTCard', function (){
    return view('insertNewTrainingCard');
});
