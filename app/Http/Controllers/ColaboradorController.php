<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ColaboradorController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'can:admin']);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $colaboradores = User::orderBy('created_at', 'desc')->where('conta', 'colaborador');

        // Filtro
        if ($request->colaborador) {
            $str = explode(' ', $request->colaborador);
            // Fazer o filtro se for enviado 2 nomes no form
            if (count($str) > 1) {
                $colaboradores
                    ->where('nome', 'like', '%' . $str[0] . '%')
                    ->where('sobrenome', 'like', '%' . $str[1] . '%');
            } else {
                $colaboradores
                    ->where('nome', 'like', '%' . $request->colaborador . '%')
                    ->orWhere('sobrenome', 'like', '%' . $request->colaborador . '%');
            }
        }

        $colaboradores = $colaboradores->paginate(10);
        return view('painel.colaboradores.colaboradores', compact('colaboradores'));
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('painel.colaboradores.visualizar_colaborador', ['colaborador' => $user]);
    }

    public function remover(User $user)
    {
        $user->delete();
        return redirect()->route('colaboradores.index')->withSuccess('Colaborador removido.');
    }

    public function ativar(User $user)
    {
        $user->status = 'ativo';
        $user->save();
        return redirect()->back()->withSuccess('Colaborador ativado.');
    }

    public function desativar(User $user)
    {
        if($user->conta == 'admin') {
            abort(403);
        }
        $user->status = 'desativado';
        $user->save();
        return redirect()->back()->withSuccess('Colaborador desativado.');
    }
}
