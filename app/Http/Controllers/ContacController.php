<?php

namespace App\Http\Controllers;

use App\Mail\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContacController extends Controller
{
    public function send()
    {
        $data = request()->validate([
            'nombre'=>'required|min:3|max:38',
            'telefono'=>'required|regex:/^09\d{8}$/',
            'mensaje'=>'required|min:5',
        ]);
        //recibe el email
        Mail::to('isaacpasquel1974@gmail.com')->send( new ContactUs($data));
       
        return back()->with('info', 'Mensaje enviado con éxito');
    }
}
