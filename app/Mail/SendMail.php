<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $title; 
    public $customer_details;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($title, $customer_details)
    {
        $this->title = $title; 
		$this->customer_details= $customer_details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {  // customer_mail is the name of template
        return $this->subject($this->title) ->view('customer_mail');
    }
}
