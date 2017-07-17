<?php

namespace App\Events;

use App\Activity;
use App\Member;
use App\Step;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class add implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public $activity;
    public $m;
    public $s;

    public function __construct(Member $member, Step $step)
    {
        //
        $this->s = $step;
       $this->m = $member;
        $updateActivity = Activity::with('member', 'step')->where(['member_id' => $member->id, 'step_id' => $step->id])->get();

        $this->activity = $updateActivity[0];

//       echo "<pre>";
//        print_r($this->activity);
//        echo "<pre>";
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastWith()
    {
        return [
            'activity' => $this->prepareData(),
        ];
    }

    protected function prepareData()
    {
        return array_merge(['member' =>$this->m,
            'step' => $this->s

        ], $this->activity->toArray());
    }

    public function broadcastOn()
    {
        return ('channel');
    }
}
