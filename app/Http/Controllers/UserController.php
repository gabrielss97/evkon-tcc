<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Conta do usuário
     *
     * @return void
     */
    public function conta()
    {
        return view('painel.conta.conta');
    }

    /**
     * Atualizar dados
     *
     * @param  mixed $request
     * @return void
     */
    public function atualizar(Request $request)
    {
        $user = User::find(Auth::user()->id);

        $request->validate([
            'nome' => ['required', 'min:3', 'string', 'max:255'],
            'sobrenome' => ['required', 'min:3', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'sexo' => ['required', 'string', 'max:255'],
            'dt_nasc' => ['required', 'date'],
            'telefone' => ['required', 'celular_com_ddd'],
        ], [], [
            'dt_nasc' => 'data de nascimento'
        ]);

        if (Auth::user()->conta == 'colaborador') {
            $request->validate([
                'sobre' => ['required', 'min:3']
            ]);
        }

        $user->fill($request->all());
        $user->save();

        return redirect()->back()->withSuccess('Dados da conta editados com sucesso.');
    }

    /**
     * Atualizar foto
     *
     * @param  mixed $request
     * @return void
     */
    public function atualizarFoto(Request $request)
    {
        $request->validate([
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // 2048 kb
        ]);

        $path = $request->foto->store('assets/img/foto');
        $user = User::find(auth()->user()->id);
        if ($user->foto != null)
            Storage::disk('local')->delete($user->foto);

        $user->foto = $path;
        $user->save();

        return redirect()->back()->withSuccess('Foto atualizada com sucesso.');
    }

    /**
     * Atualizar Senha
     *
     * @param  mixed $request
     * @return void
     */
    public function atualizarSenha(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'current_password' => ['required', function ($attribute, $value, $fail) use ($user) {
                if (!Hash::check($value, $user->password)) {
                    return $fail(__('Antiga senha não confere.'));
                }
            }],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => ['required', 'same:password'],
        ], [], [
            'current_password' => 'antiga senha',
            'password' => 'nova senha',
            'password_confirmation' => 'confirmar nova senha',
        ]);

        return redirect()->back()->withSuccess('Senha alterada com sucesso.');
    }
}
