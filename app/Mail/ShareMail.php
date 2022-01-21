<?php

namespace App\Mail;

use App\Support\Share;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ShareMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Share $share)
    {
        $this->share = $share;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to($this->share)
        ->subject('Shared Media from the SASMFOS Website')
        ->replyTo('noreply@sasmfos.org')
        ->markdown('emails.share', [
            'share' => $this->share
        ]);
    }
}
