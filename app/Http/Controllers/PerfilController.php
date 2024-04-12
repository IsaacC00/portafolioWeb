<?php

namespace App\Http\Controllers;

use App\Models\Information;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class PerfilController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index() 
    {
         $information = Information::all();
        return view('admin.user.index',compact('information'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>['required','unique:users,name,'.auth()->user()->id,'min:3','max:20']
        ]);
        
        //Guardar datos\
        $usuario = User::find(auth()->user()->id);
        $usuario->name = $request->name;
        $usuario->save();
        //Cambiar contrasenia

        if($request->oldpassword || $request->password) {
            $this->validate($request, [
                'password' => 'required|confirmed',
            ]);
 
            if (Hash::check($request->oldpassword, auth()->user()->password)) {
                $usuario->password = Hash::make($request->password) ?? auth()->user()->password;
                $usuario->save();
            } else {
                return back()->with('message', 'La Contraseña Actual no Coincide');
            }
        }

        //redireccionar
        return redirect()->route('admin.user')->with('info', 'Perfil Actualizado');
    
    }
}
