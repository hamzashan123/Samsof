<?php

namespace App\Events;

use App\Member;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PopUploaded
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    /**
     * @var Member
     */
    public $member;


    /**
     * Create a new event instance.
     *
     * @param Member $member
     */
    public function __construct(Member $member, string $date)
    {
        //
        $this->member = $member;
        $this->date = $date;
    }
}
