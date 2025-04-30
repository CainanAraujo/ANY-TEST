<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TesteEmail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct() {}

    public function build()
    {
        return $this->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))
                    ->subject('Teste de E-mail - Laravel')
                    ->view('teste'); // Usa a view resources/views/teste.blade.php
    }
}
