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

Route::get('/schede', function () {
    return view('recordCardPage');
});

Route::get('/esercizi', function () {
    return view('excercisePage');
});

Route::get('/abbonamenti', function () {
    return view('subscriptionPage');
});

Route::get('/iscritti', function () {
    return view('usersPage');
});

Route::get('/nuovoUtente', function (){
   return view('userAdd');
});

Route::get('/corsi', function (){
    return view('newCourse');
});

Route::get('/nuovoAbbonamento', function (){
    return view('newSubscription');
});

Route::get('/prova', function (){
    return view('viewStrap');
});

Route::get('/exc', function (){
    return view('newExcercise');
});

Route::get('/nuovaScheda', function (){
    return view('newCard');
});

Route::post('/addUserPost', 'UsersManager@createUser');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
