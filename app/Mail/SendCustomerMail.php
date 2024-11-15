<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendCustomerMail extends Mailable
{
    use Queueable, SerializesModels;
    public $mail_data;
    /**
     * Create a new message instance.
     */
    public function __construct($mail_data)
    {
        $this->mail_data = $mail_data;
        $this->subject('Booking Confirmation - Thank You for Booking with Cricademia!');
        $this->replyto(env('MAIL_FROM_ADDRESS'));
    }

    public function build()
    {
        return [
			$this->view('mail.event-booking-customer')
		];
    }
}
