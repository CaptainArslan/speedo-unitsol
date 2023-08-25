<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class IncompeteCheckoutEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $job_post;

    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // dd(2);
        $user = $this->user;
        return $this->view('mail.checkout_incomplete')->subject($user['email'] . ' Checkout Incomplete')->with('user', $this->user);
    }
}
