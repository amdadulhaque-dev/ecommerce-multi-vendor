<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VendorNotification extends Mailable {
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     * @return void
    */
    public $rnd_password = "";
    public function __construct($random_password) {
        //
        $this->rnd_password = $random_password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.vendornotification',[
            'rnd_password' => $this->rnd_password,
        ]);
    }
}
