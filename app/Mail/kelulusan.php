<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class kelulusan extends Mailable
{
    use Queueable, SerializesModels;
    public $din;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($din)
    {
        $this->din = $din;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.orders.kelulusan');
    }
}
