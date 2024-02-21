<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Auth;

class authController extends Controller
{
    public function showLoginForm()
    {
        return view('ns.login', ['formType' => 'login']);
    }

    public function showProfile()
    {
        return view('ns.profile');
    }

    public function register(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
        ]);

        // Crear el nuevo usuario
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        if ($request->hasFile("img")){
            $img = $request->file("img");
            $nomImg = Str::slug($request->email).".".$img->guessExtension();
            $ruta = public_path("img/profilePic/");

            copy($img->getRealPath(),$ruta.$nomImg);

            $user->img = $nomImg;
            $user->type = $img->guessExtension();
        }
        $user->save();

        // Iniciar sesión automáticamente después del registro
        Auth::login($user);

        // Redireccionar a la página de inicio o a donde desees
        return redirect()->action([newsletterController::class, 'index']);
    }

    public function login(Request $request)
    {
        // Validar los datos del formulario
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Autenticación exitosa, redirigir a la página de inicio
            return redirect()->action([newsletterController::class, 'index']);
        }

        // Si las credenciales son incorrectas, volver al formulario de inicio de sesión con un mensaje de error
        return back()->withErrors(['email' => 'Estas credenciales no coinciden con nuestros registros.']);
    }
}