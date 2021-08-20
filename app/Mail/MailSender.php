<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailSender extends Mailable
{
    use Queueable, SerializesModels;


    public $vmail;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($vmail)
    {
        $this->vmail = $vmail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Someone searching blood near you!')
            ->from('info@bloodbank.com')
            ->view('mails.blood_request')
            ->text('mails.blood_request_plain');
            /*->with(
                [
                    'testVarOne' => '1',
                    'testVarTwo' => '2',
                ])
            ->attach(public_path('/images').'/demo.jpg', [
                'as' => 'demo.jpg',
                'mime' => 'image/jpeg',
            ]);*/
    }
}
