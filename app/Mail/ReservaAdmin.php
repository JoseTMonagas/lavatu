<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReservaAdmin extends Mailable
{
    use Queueable, SerializesModels;

    protected $user;
    protected $reserva;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $reserva)
    {
        $this->reserva = $reserva;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $user = $this->user;
        $reserva = $this->reserva;
        return $this->subject($user->name . ' ' . $user->surname)
                    ->markdown('emails.reserva_admin')
                    ->with(compact('user', 'reserva'));
    }
}
