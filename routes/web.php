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

use App\Activity;
use App\Member;
use App\Step;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('testListActivity', function () {
    $user = \Illuminate\Support\Facades\Auth::user();
    $stp = $user->step;
    $mem = $stp->members()->paginate(15);
    //return $mem[0]->pivot->endTime;
    return view('listActivity', ['list' => $mem]);

});
Route::get('start/{member}/{step}', 'leader@start');
Route::post('done/{member}/{step}','leader@done');
Route::post('remainingSteps/{member}','leader@remainingSteps');
Route::get('newStep/{member}/{step}', 'leader@newStep');
Route::get('/testmodel', function () {
    // return view('index');
    $mem = \App\Member::find(1);
    $user = \Illuminate\Support\Facades\Auth::user();
    $step = $user->step;
    $mem->steps()->attach($step);
    return 1;
});
Route::get('/test', function () {
    $m = Member::all()->first();
    $s = Step::all()->first();
    $a = \App\Activity::all()->first();
    event(new \App\Events\updateStatus($s, $m, $a));
});
Route::get('/csrf',function ()
{

    return csrf_token();

});
Route::get('testAdd/{member}/{step}',function (Member $member,Step $step)
{
    $updateActivity= Activity::with('member','step')->where(['member_id'=>$member->id,'step_id'=>$step->id ])->firstorfail() ;
    event(new \App\Events\add($member,$step));
});
Route::post('/getSteps', 'leader@getSteps');
Route::post('/getActivities', 'leader@getActivities');
Route::get('/home', 'HomeController@index')->name('home');
