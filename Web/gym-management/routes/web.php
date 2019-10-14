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

//Route::get('/corsi', 'CoursesManager@getAllCourses');

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

Route::get('/addUser', function (){
   return view('userAdd');
});

Route::get('/inserisciCorso', function (){
    return view('insertNewCourse');
});


Route::get('/nuovoAbbonamento', function (){
    return view('subStrap');
});

Route::get('/prova', function (){
    return view('viewStrap');
});

Route::get('/exc', function (){
    return view('insertNewExcercise');
});


Route::post('/userAdd', 'UsersManager@Pelo');


Route::get('/corso', function (){
    return view('courses');
});


Route::post('/userAdd', 'UsersManager@Pelo');



Route::post('/userCard', 'UsersManager@Pelo');
