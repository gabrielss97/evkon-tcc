<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class RegistroCliente extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Registro do cliente
     *
     * @param  mixed $request
     * @return void
     */
    public function registro(Request $request)
    {

        Session::flash('registro_cliente_erro', true);

        $request->validate([
            'nome' => ['required', 'min:3', 'string', 'max:255'],
            'sobrenome' => ['required', 'min:3', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'sexo' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = (new User)->fill($request->all());
        $user->password = bcrypt($request->password);
        $user->save();

        Auth::login($user, true);
        return redirect()->route('painel.home')->with('registro_cliente', true);
    }
}
