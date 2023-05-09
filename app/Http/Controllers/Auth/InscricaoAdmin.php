<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class InscricaoAdmin extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    
    /**
     * Inscrição do adminstrador
     *
     * @param  mixed $request
     * @return void
     */
    public function inscricao(Request $request)
    {
        if (User::where('conta', 'admin')->exists()) {
            abort(403);
        }

        $request->validate([
            'nome' => ['required', 'min:3', 'string', 'max:255'],
            'sobrenome' => ['required', 'min:3', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'sexo' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = (new User)->fill($request->all());
        $user->password = bcrypt($request->password);
        $user->conta = 'admin';
        $user->save();

        Auth::login($user, true);
        return redirect()->route('painel.home')->withSuccess('Administrador salvo com sucesso!');
    }
}
