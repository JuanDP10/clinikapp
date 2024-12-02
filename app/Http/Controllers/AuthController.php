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



    public function showProfileForm(){
        $datos = Auth::user(); // Usuario autenticado
        return view('profile', compact('datos')); // Pasar los datos del usuario a la vista
    }



    public function profile(Request $request){
        // Validar los datos
        $datos = $request->validate([
            'email' => 'required|email',
            'name' => 'required|string',
            'foto' => 'nullable|image',
        ]);

        $user = Auth::user();

        // Procesar la imagen si se sube una nueva
        if ($request->hasFile('foto')) {
            // Eliminar la foto actual si existe
            if ($user->foto) {
                $filePath = public_path('images/' . $user->foto);
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }

            // Guardar la nueva foto
            $foto = $request->file('foto');
            $fileName = uniqid() . '_' . $foto->getClientOriginalName();
            $foto->move(public_path('images'), $fileName);
            $datos['foto'] = $fileName;
        }

        // Si se marca el checkbox para eliminar la foto
        if ($request->has('delete_foto') && $request->delete_foto == 1) {
            // Eliminar la foto físicamente si existe
            if ($user->foto) {
                $filePath = public_path('images/' . $user->foto);
                if (file_exists($filePath)) {
                    unlink($filePath);
                }

                // Eliminar la foto de la base de datos
                $user->update(['foto' => null]);
            }
        }

        // Actualizar los datos del usuario
        $user->update($datos);

        return redirect()->route('profileview')->with('success', 'Perfil actualizado correctamente.');
    }




    public function deletePhoto(){
        $user = Auth::user();

        if ($user->foto) {
            $filePath = public_path('images/' . $user->foto);
            if (file_exists($filePath)) {
                unlink($filePath); // Eliminar la foto físicamente
            }

            $user->update(['foto' => null]); // Eliminar el registro de la foto en la base de datos
        }

        return redirect()->route('profile')->with('success', 'Foto eliminada correctamente.');
    }

}
