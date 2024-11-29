<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Auth;

class AuthController extends Controller
{

    public function register(Request $request){


        User::create( $request->all() );

        return redirect('login');        


    }


    public function check(Request $request){

        $datos = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($datos)) {
            $request->session()->regenerate();
 
            return redirect()->intended('home');
        }
 
        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
        ])->onlyInput('email');

    }

    public function profile(Request $request){

        $datos = $request->validate([
            'email' => ['required', 'email'],
            'name' => ['required'],
            'foto' => ['image'],
        ]);
        
        
        $foto = $request->file('foto');

        $name = rand(1000000, 9999999) . $foto->getClientOriginalName();

        $path = $request->foto->move(public_path('images'), $name);

        $datos['foto'] = $name;

        User::find(Auth::id())->update($datos);

        return redirect('home');

    }


}
