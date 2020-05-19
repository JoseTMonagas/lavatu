<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReservaRealizada extends Mailable
{
    use Queueable, SerializesModels;
    protected $hora;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($hora)
    {
        $this->hora = $hora;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $hora = $this->hora;
        return $this->markdown('emails.reserva_realizada')->with(compact('hora'));
    }
}
