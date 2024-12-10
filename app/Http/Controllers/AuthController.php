<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    public function loginform()
    {
        return view('auth.login-form');
    }

    public function loginProcess(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (!auth()->attempt($credentials)) {
            return redirect()
                ->back(fallback: route('auth.login.form'))
                ->withInput()
                ->with('feedback.message', 'Las credenciales son incorrectas.')
                ->with('feedback.type', 'danger');
        }

        return redirect()
            ->route('home')
            ->with('feedback.message', 'Inicio de sesión exitoso!');
    }

    public function registerForm()
    {
        return view('auth.register-form');
    }

    public function registerProcess(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|confirmed|min:6',
        ]);

        // reCAPTCHA validacion
        $recaptchaResponse = $request->input('g-recaptcha-response');

        if (!$this->verifyRecaptcha($recaptchaResponse)) {
            return redirect()->back()->withErrors(['g-recaptcha' => 'La verificación reCAPTCHA fue inválida.']);
        }

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role_id' => 2, // user
        ]);

        auth()->login($user);

        return redirect()->route('profile')
            ->with('feedback.message', 'Registro exitoso, bienvenido!')
            ->with('feedback.type', 'success');
    }

    private function verifyRecaptcha($recaptchaResponse)
    {
        $secretKey = env('RECAPTCHA_SECRET_KEY');

        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => $secretKey,
            'response' => $recaptchaResponse,
            'remoteip' => request()->ip(),
        ]);

        $body = json_decode($response->getBody(), true);

        return $body['success'];
    }

    public function logoutProcess(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('auth.login.form')
            ->with('feedback.message', 'Cierre de sesión exitoso!');
    }

    // Perfil con datos del usuario
    public function showProfile()
    {
        $user = auth()->user();
        return view('auth.profile', compact('user'));
    }

    // Formulario de edición de perfil
    public function editForm()
    {
        $user = auth()->user();
        return view('auth.edit-profile', compact('user'));
    }

    public function editProcess(Request $request)
    {
        $user = auth()->user();

        // Validar los campos
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        // Actualizar los campos
        $user->name = $request->input('name');

        $user->save();

        return redirect()
            ->route('profile')
            ->with('feedback.message', 'Perfil actualizado correctamente.');
    }

    // Perfil con compras del usuario
    public function showOrders()
    {
        $user = auth()->user();
        return view('auth.profile-orders', compact('user'));
    }

    // Perfil con detalles de la compra del usuario
    public function showOrder(int $id)
    {
        $user = auth()->user();
        $order = $user->orders()->findOrFail($id);
        return view('auth.profile-order', compact('user', 'order'));
    }
}
