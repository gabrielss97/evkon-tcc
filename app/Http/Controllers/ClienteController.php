<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'can:admin']);
    }

    public function index(Request $request)
    {
        $clientes = User::orderBy('created_at', 'desc')->where('conta', 'cliente');

        // Filtro
        if ($request->cliente) {
            $str = explode(' ', $request->cliente);
            // Fazer o filtro se for enviado 2 nomes no form
            if (count($str) > 1) {
                $clientes
                    ->where('nome', 'like', '%' . $str[0] . '%')
                    ->where('sobrenome', 'like', '%' . $str[1] . '%');
            } else {
                $clientes
                    ->where('nome', 'like', '%' . $request->cliente . '%')
                    ->orWhere('sobrenome', 'like', '%' . $request->cliente . '%');
            }
        }

        $clientes = $clientes->paginate(12);
        return view('painel.clientes.clientes', compact('clientes'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('painel.clientes.visualizar_cliente', ['cliente' => $user]);
    }

    public function remover(User $user)
    {
        $user->delete();
        return redirect()->route('clientes')->withSuccess('Cliente removido.');
    }

    public function ativar(User $user)
    {
        $user->status = 'ativo';
        $user->save();
        return redirect()->back()->withSuccess('Cliente ativado.');
    }

    public function desativar(User $user)
    {
        if($user->conta == 'admin') {
            abort(403);
        }
        $user->status = 'desativado';
        $user->save();
        return redirect()->back()->withSuccess('Cliente desativado.');
    }
}
