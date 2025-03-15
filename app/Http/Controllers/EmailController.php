<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\MyMailMailable;
use Illuminate\Support\Facades\Mail;
use App\Models\Carrera;

class EmailController extends Controller
{
    //

    public function sendEmail( ){
        //Enviar un correo electrónico
        $subject="No responder";
        $body="Este es un mensaje de prueba";
        $sentTo = "juancgomezm2705@gmail.com";
        Mail::to($sentTo)->send(new MyMailMailable($body));
        $carreras = Carrera::orderBy('nombre_carrera')->get();
        return view('carreras.index', compact('carreras'));
    }
        
}
