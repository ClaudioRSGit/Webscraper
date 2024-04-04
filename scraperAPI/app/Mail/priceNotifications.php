<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class priceNotifications extends Mailable
{
    use Queueable, SerializesModels;

    public $price;

    public function __construct($price)
    {
        $this->price = $price;
    }

    public function build()
    {
        return $this->subject('Alerta de Preço!')
                    ->view('emails.priceNotificationEmail')
                    ->with(['price' => $this->price]);
    }
}
