<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ForgetPasswordManager extends Controller
{
   public function forgetPassword()
   {
        return view('home.reset-password');
   }

   public function forgetPasswordPost(Request $request)
   {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            
        ]);

        DB::table('password_reset_tokens')
        ->where(['email' => $request->email])->delete();


        $token = Str::random(64);

        DB::table('password_reset_tokens')->insert([
            'email'=>$request->email,
            'token'=>$token,
            'created_at' => Carbon::now()
        ]);

        Mail::send('emails.forget-password',['token' =>$token],function($menssge) use ($request){
            $menssge->to($request->email);
            $menssge->subject("Cambiar contraseña");
           
        });

        return redirect()->route('forget.password')->with('info','Enviamos un email para cambiar tu contraseña');
   }

   public function resetPassword($token)
   {
        $tokenData = DB::table('password_reset_tokens')
        ->where('token', $token)
        ->first();

        if (!$tokenData) {
            return redirect('auth.login')->with('mensaje','El token es inválido');
        }else{    
            return view('home.new-password',compact('token'));
        }
   }

   public function resetPasswordPost(Request $request)
   {
        $request->validate([
            'email'=>'required|email|exists:users,email',
            'password'=>'required|min:4|confirmed',
            'password_confirmation'=>'required'
        ]);

        $updatePassword = DB::table('password_reset_tokens')->
        where([
            'email'=>$request->email,
            'token'=>$request->token
        ])->first();

        if(!$updatePassword){
             return redirect()->to(route('reset.password'))->with('info','Error, token inválido o expirado.');
        }

        User::where('email',$request->email)->update([
            "password"=>Hash::make($request->password)
        ]);

        DB::table('password_reset_tokens')->where(['email' => $request->email])->delete();

        return redirect()->to(route('login'))->with('info','Nueva Contraseña registrada con éxito');
   }
}
