<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    /**
     * authRedirect
     *
     * @param  mixed $provider
     * @param  mixed $conta
     * @return void
     */
    public function authRedirect($provider, $conta = 'cliente')
    {
        Session::put('conta', $conta);
        return Socialite::driver($provider)->redirect();
    }

    /**
     * authCallback
     *
     * @param  mixed $provider
     * @return void
     */
    public function authCallback($provider)
    {
        $usuario_provider = Socialite::driver($provider)->user();
        $usuario = User::where('provider_id', $usuario_provider->id)->first();

        // Verificar se o email já existe em um cadastro sem ser por rede social
        if ($usuario == null && User::where('email', $usuario_provider->email)->first() != null)
            return redirect()->route('inicio')->with('login_erro', 'O email já está sendo utilizado!');

        if ($usuario != null) {
            $this->update($usuario, $usuario_provider);
        } else {
            $usuario = $this->criarUsuario($usuario_provider, $provider);
        }

        Auth::login($usuario);
        return redirect()->route('painel.home');
    }

    /**
     * Atualizar foto e token
     *
     * @param  mixed $usuario
     * @param  mixed $usuario_provider
     * @return void
     */
    public function update($usuario, $usuario_provider)
    {
        $usuario->update([
            'provider_token' => $usuario_provider->token,
            'provider_refresh_token' => $usuario_provider->refreshToken,
            'foto' => substr_count($usuario->foto, 'http') > 0 ? $usuario_provider->getAvatar() : $usuario->foto,
        ]);

        return $usuario;
    }

    /**
     * Nome e sobrenome obtidos da rede social
     *
     * @return void
     */
    public function nomeESobrenome($usuario_provider)
    {
        $nomeArr = explode(' ', $usuario_provider->name);
        $nome = isset($nomeArr[0]) ? $nomeArr[0] : 'Nome';
        $sobrenome = isset($nomeArr[1]) ? $nomeArr[1] : '';
        if (isset($nomeArr[2])) {
            $sobrenome = $sobrenome . ' ' . isset($nomeArr[2]) ? $nomeArr[2] : '';
        }
        return [
            'nome' => $nome,
            'sobrenome' => $sobrenome,
        ];
    }

    /**
     * Criar registro de usuário
     *
     * @param  mixed $usuario_provider
     * @param  mixed $provider
     * @param  mixed $conta
     * @return void
     */
    public function criarUsuario($usuario_provider, $provider)
    {
        $conta = Session::get('conta') == null ? 'cliente' : Session::get('conta');

        $nome_e_sobrenome = $this->nomeESobrenome($usuario_provider);
        $usuario = User::create([
            'nome' => $nome_e_sobrenome['nome'],
            'sobrenome' => $nome_e_sobrenome['sobrenome'],
            'email' => $usuario_provider->email,
            'conta' => $conta,
            'foto' => $usuario_provider->getAvatar(),
            'provider' => $provider,
            'provider_id' => $usuario_provider->id,
            'provider_token' => $usuario_provider->token,
            'provider_refresh_token' => $usuario_provider->refreshToken,
        ]);

        return $usuario;
    }
}
