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
Route::get('testListActivity',function ()
{

    $user=\Illuminate\Support\Facades\Auth::user();
    $stp=$user->step;
    $mem= $stp->members;
    //return $mem[0]->pivot->endTime;
    return view('listActivity',['list'=>$mem]);

});

Route::get('/testmodel',function ()
{
   // return view('index');
   $mem = \App\Member::find(1);
   $user= \Illuminate\Support\Facades\Auth::user();
   $step= $user->step;
$mem->steps()->attach($step);
   return 1;

});
Route::get('/home', 'HomeController@index')->name('home');
