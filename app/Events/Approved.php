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

class Approved
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    /**
     * @var Member
     */
    public $member;
    /**
     * @var string
     */
    public $password;

    /**
     * Create a new event instance.
     *
     * @param Member $member
     * @param string $password
     */
    public function __construct(Member $member, string $password)
    {
        $this->member = $member;
        $this->password = $password;
    }
}
