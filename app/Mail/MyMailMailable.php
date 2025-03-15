<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Carrera;

class MyMailMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $body;

    /**
     * Create a new message instance.
     */
    public function __construct($body)
    {
        //
        $this->body = $body;
    }

    public function build(){
        $carreras = Carrera::orderBy('nombre_carrera')->get();
        return $this->subject('No responder')
        ->view('emails.carreras', compact('carreras'));
    }

}
