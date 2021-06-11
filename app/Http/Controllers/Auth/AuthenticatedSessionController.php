<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $usuario = Auth::id();
        $usuario_data = User::find($usuario);

        $usuario_id = $usuario_data->id;
        session()->put('usuario_id', $usuario_id);

        $usuario_name = $usuario_data->name;
        session()->put('usuario_name', $usuario_name);

        $usuario_telefono = $usuario_data->telefono;
        session()->put('usuario_telefono', $usuario_telefono);

        $usuario_email = $usuario_data->email;
        session()->put('usuario_email', $usuario_email);        

        $request->session()->regenerate();

        //Todos los usuarios
        $todosLosUsuarios = User::where('id','<>',$usuario_id)->get();
        //dd($todosLosUsuarios);
        return view('dashboard')->with([
            'todosLosUsuarios' => $todosLosUsuarios,
        ]);

        /*
        return redirect()
            ->intended(RouteServiceProvider::HOME)
            ->with([
                    'todosLosUsuarios' => $todosLosUsuarios,
                    ])
            ;
        */            
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
