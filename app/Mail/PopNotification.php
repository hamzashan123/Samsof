<?php

namespace App\Mail;

use App\Member;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PopNotification extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * @var Member
     */
    protected $member;

    /**
     * @var string
     */
    protected $date;

    /**
     * Create a new message instance.
     *
     * @param Member $member
     */
    public function __construct(Member $member, string $date)
    {
        $this->member = $member;
        $this->date = $date;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->attach(Storage::disk('local')->path('pops/'.$this->member->id.'.pdf'), [
                'as' => Str::slug($this->member->name).'-pop.pdf',
            ])
            ->markdown('emails.pop', [
                'member' => $this->member,
                'date' => $this->date,
            ]);
    }
}
