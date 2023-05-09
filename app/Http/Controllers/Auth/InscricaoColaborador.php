<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class InscricaoColaborador extends Controller
{
    /**
     * View para a inscrição do colaborador
     *
     * @return void
     */
    public function inscricaoColaborador()
    {
        return view('inscricao_colaborador');
    }

    /**
     * Inscrição colaborador
     *
     * @param  mixed $request
     * @return void
     */
    public function inscricao(Request $request)
    {

        $request->validate([
            'nome' => ['required', 'min:3', 'string', 'max:255'],
            'sobrenome' => ['required', 'min:3', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'sexo' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = (new User)->fill($request->all());
        $user->password = bcrypt($request->password);
        $user->conta= 'colaborador';
        $user->save();

        Auth::login($user, true);
        return redirect()->route('painel.home')->with('registro_colaboradro', true);
    }
}
