<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use Illuminate\Http\Request;
use App\Models\DenunciaComentario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DenunciaComentarioController extends Controller
{    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Salvar a denúncia
     *
     * @param  mixed $request
     * @param  mixed $comentario
     * @return void
     */
    public function denunciarComentario(Request $request, Comentario $comentario)
    {
        $this->authorize('colaborador');
        Session::flash('denunciar_comentario', true);

        $request->validate([
            'motivo' => ['required', 'min:3'],
        ]);
        $denucia = (new DenunciaComentario)->fill($request->all());
        $denucia->comentario_id = $comentario->id;
        $denucia->user_id = Auth::user()->id;
        $denucia->save();
        return redirect()->back()->withSuccess('Comentário denunciado.');
    }
    
    /**
     * Ver as denúcias de comentáios
     *
     * @return void
     */
    public function denunciasComentarios()
    {
        $this->authorize('admin');
        $denuncias= DenunciaComentario::orderBy('created_at', 'desc')->paginate(10);
        return view('painel.denuncias_de_comentarios.denuncias', compact('denuncias'));
    }

    public function removerComentario(Comentario $comentario)
    {
        $this->authorize('admin');
        $comentario->delete();
        return redirect()->back()->withSuccess('Comentário removido.');
    }
    
    public function naoRemoverComentarioDenunciado(DenunciaComentario $denunciacomentario,Comentario $comentario)
    {
        $this->authorize('admin');
        $denunciacomentario->status= 'nao_removido';
        $denunciacomentario->save();
        return redirect()->back()->withSuccess('Comentário não removido.');
    }
}
