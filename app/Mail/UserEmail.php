<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $contents;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($contents)
    {
       $this->contents = $contents;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Data Pointeuse')->view('email.test');
    }
}
