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
Route::get('start/{member}/{step}', function (Member $member, Step $step) {

    $fg = $member->steps()->updateExistingPivot($step->id, ['startTime' => \Carbon\Carbon::now(),
        'status' => "Progress"
    ]);

    return back();

});
Route::get('done/{member}/{step}', function (Member $member, Step $step) {


    $fg= $member->steps()->updateExistingPivot($step->id,['EndTime'=> \Carbon\Carbon::now(),
        'status'=>"Done"
    ]);

    $list = ( Step::all());
    $list2 = $member->steps()->get();
        $list = $list->diff($list2);


    return view('selectNextStep', ['member' => $member, 'step' => $step, 'list' => $list]);
//    return back();

});
Route::get('newStep/{member}/{step}', function (Member $member, Step $step) {


    $member->steps()->attach($step);


});
Route::get('/testmodel', function () {
    // return view('index');
    $mem = \App\Member::find(1);
    $user = \Illuminate\Support\Facades\Auth::user();
    $step = $user->step;
    $mem->steps()->attach($step);
    return 1;

});
Route::get('/home', 'HomeController@index')->name('home');
