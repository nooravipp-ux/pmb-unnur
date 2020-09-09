<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Pendaftaran extends Mailable
{
    use Queueable, SerializesModels;

    public $get;
    public $fak;
    public $pro;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($get,$fak,$pro)
    {
        $this->get = $get;
        $this->fak = $fak;
        $this->pro = $pro;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.orders.mhsbaru');
    }
}
