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

Route::get('/corsi', 'CoursesManager@getAllCourses');

Route::get('/getAllUser', 'UserManager@getAllUser');

Route::get('/firetest', 'Firetest@test');
Route::get('/firetest2', 'Firetest@test2');
Route::get('/firetest3', 'Firetest@test3');
Route::get('/esercizi', 'ExercisesManager@exercisePage');

Route::get('/gestioneSchede', function () {
    return view('TrainingCards');
});

Route::get('/gestioneAbbonamenti', function () {
    return view('subscriptionPage');
});

Route::get('/gestioneIscritti', function () {
    return view('usersPage');
});

Route::get('/nuovoUtente', function (){
   return view('userAdd');
});

Route::get('/gestioneCorsi', 'CoursesManager@coursesPage');

Route::get('/nuovoAbbonamento', function (){
    return view('newSubscription');
});

Route::get('/provaa', function (){
    return view('viewStrap');
});

Route::get('/nuovaScheda', function (){
    return view('newCard');
});

Route::post('/addUserPost', 'UsersManager@createUser');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/nuovoCorso', function () {
    return view('insertNewCourse');
});

Route::get('/nuovoEsercizio', function () {
    return view('insertNewExcercise');
});


Route::post('/insertFormCourse', 'CoursesManager@addCourse');

Route::post('/insertFormExercise', 'ExercisesManager@addExercise');
