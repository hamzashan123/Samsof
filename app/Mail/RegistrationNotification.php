<?php

namespace App\Mail;

use App\Member;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\URL;

class RegistrationNotification extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * @var Member
     */
    protected $member;

    /**
     * Create a new message instance.
     *
     * @param Member $member
     */
    public function __construct(Member $member)
    {
        $this->member = $member;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('A new registration on the SASMFOS website has been submitted')
            ->replyTo($this->member->email, $this->member->name)
            ->markdown('emails.registered', [
                'member' => $this->member,
                'approvalUrl' => URL::signedRoute('admin.members.approve', [$this->member]),
            ]);
    }
}
