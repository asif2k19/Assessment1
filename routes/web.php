<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::view('/Registration', 'User_registartion');

Route::get('/dashboard', function () {
     return view('Dashboard');
     //return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('google')->name('google.')->group( function(){
    Route::get('login', 'GoogleController@loginWithGoogle')->name('login');

});
Route::any('callback/google','GoogleController@callbackFromGoogle')->name('callback');

Route::post('postregistration','NewUserController@postregistration');
Route::get('welcome1','NewUserController@getwelcome');

Route::get('/getuserdata','NewUserController@getuserdata');

Route::get('/pagelogout','NewUserController@logout');


Route::get('/checkemail','NewUserController@checkemail');

require __DIR__.'/auth.php';


