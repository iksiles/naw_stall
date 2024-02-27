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

    public function saveProfile(Request $request)
{
    // dd($request->all());
    // Verificar si se ha enviado un tema en la solicitud y almacenarlo en la sesión
    if ($request->has('theme')) {
        // Guardar tema en la sesión
        session()->put('theme', $request->theme);
    }

    // Verificar si se ha enviado un idioma en la solicitud y almacenarlo en la sesión
    if ($request->has('language')) {
        // Guardar idioma en la sesión
        session()->put('locale', $request->language);
        // Establecer el locale en la aplicación
        $locale = $request->language;
        app()->setLocale($locale);
    }

    // Redirigir de vuelta a la página del perfil
    return redirect()->route('ns.profile', ['theme' => $request->theme, 'language' => $request->language]);
}



    public function logout()
    {
        Auth::logout(); // Cerrar sesión
        return redirect()->action([HomeController::class, 'index']); // Redirigir al index
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
        } else {
            $user->img = "default.png";
            $user->type = "png";
        }
            $user->save();

        // Iniciar sesión automáticamente después del registro
        Auth::login($user);

        // Redireccionar a la página de inicio o a donde desees
        return redirect()->action([HomeController::class, 'index']);
    }

    public function login(Request $request)
    {
        // Validar los datos del formulario
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Autenticación exitosa, redirigir a la página de inicio
            return redirect()->action([HomeController::class, 'index']);
        }

        // Si las credenciales son incorrectas, volver al formulario de inicio de sesión con un mensaje de error
        return back()->withErrors(['email' => 'Estas credenciales no coinciden con nuestros registros.']);
    }
}