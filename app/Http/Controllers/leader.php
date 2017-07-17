<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Member;
use App\Step;
use Illuminate\Http\Request;

class leader extends Controller
{
    //
    public function start(Member $member, Step $step)
    {

        $fg = $member->steps()->updateExistingPivot($step->id, ['startTime' => \Carbon\Carbon::now(),
            'status' => "Progress"
        ]);


        $updateActivity= Activity::with('member','step')->where(['member_id'=>$member->id,'step_id'=>$step->id ])->firstorfail() ;
        event(new \App\Events\updateStatus($updateActivity));
        return $updateActivity;
    }

    public function getSteps()
    {
        $steps = Step::all();

        return $steps;
    }

    public function getActivities()
    {
        $list = \App\Activity::with("member", 'step')->get();
        return $list;
    }

    public function remainingSteps(Member $member)
    {

        $list = (Step::all());
        $list2 = $member->steps()->get();
        $list = $list->diff($list2);
        return $list;

    }

    public function done(Member $member, Step $step)
    {


        $fg = $member->steps()->updateExistingPivot($step->id, ['EndTime' => \Carbon\Carbon::now(),
            'status' => "Done"
        ]);
        $updateActivity= Activity::with('member','step')->where(['member_id'=>$member->id,'step_id'=>$step->id ])->firstorfail() ;
        event(new \App\Events\updateStatus($updateActivity));

        return 'ok';
//    return back();

    }
public  function newStep (Member $member, Step $step) {


    $member->steps()->attach($step);

    event(new \App\Events\add($member,$step));

}
}
