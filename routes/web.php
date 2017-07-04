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
    return view('welcome');
});

Auth::routes();
Route::get('/testmodel',function ()
{

   $mem = \App\Member::find(1);
   $user= \Illuminate\Support\Facades\Auth::user();
   $step= $user->step;
///  $step->prerequisites()->save($step);
   return $step->prerequisites()->get();

});
Route::get('/home', 'HomeController@index')->name('home');
