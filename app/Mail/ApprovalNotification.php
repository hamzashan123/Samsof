<?php

namespace App\Mail;

use App\Member;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ApprovalNotification extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * @var Member
     */
    protected $member;
    /**
     * @var string
     */
    protected $password;

    /**
     * Create a new message instance.
     *
     * @param Member $member
     * @param string $password
     */
    public function __construct(Member $member, string $password)
    {
        $this->member = $member;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.approved', [
                'member' => $this->member,
                'password' => $this->password,
            ]);
    }
}
