<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BookingConfirmationEmail extends Mailable
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
        return $this->view('mail.booking_confirmation')->subject($user['email'] . ' Booking Successfully')->with('user', $this->user);
    }
}
