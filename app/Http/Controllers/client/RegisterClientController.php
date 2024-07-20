<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Models\Notificacion;
use Illuminate\View\View;
use App\Events\NewNotification;
use App\Models\RoleUser;
use Illuminate\Validation\ValidationException;

class RegisterClientController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store_registrar(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role_id' => ['required', 'exists:roles,id_role'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'status_user' => $request->status_user,
            'password' => Hash::make($request->password),
        ]);

        RoleUser::create([
            'idRole' => $request->input('role_id'),
            'idUsuario' => $user->id,
        ]);

        event(new Registered($user));

        Auth::login($user);

        Notificacion::create([
            'type' => 'Consulta',
            'data' => json_encode(['message' => 'Tienes un nuevo cliente! dale la bienvenida a ' . $user->name]),
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect(RouteServiceProvider::HOME_CLIENT);
    }

}
