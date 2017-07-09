<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class leader extends Controller
{
    //
    public function startButton  (Member $member, Step $step)
    {

        $fg = $member->steps()->updateExistingPivot($step->id, ['startTime' => \Carbon\Carbon::now(),
            'status' => "Progress"
        ]);

        return back();
    }

}
