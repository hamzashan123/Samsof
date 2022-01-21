<?php

namespace App\Mail;

use App\Member;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PopApprovedMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var Member
     */
    protected $member;
    /**
     * Create a new message instance.
     *
     * @return void
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
        return $this->subject('Proof Of Payment Approved')
            ->markdown('emails.pop-approved', [
                'member' => $this->member,
            ]);
    }
}
