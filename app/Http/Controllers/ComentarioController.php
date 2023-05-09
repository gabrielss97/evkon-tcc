<?php

namespace App\Http\Controllers;

use App\Models\Anuncio;
use App\Models\Comentario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ComentarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addComentario(Request $request, Anuncio $anuncio)
    {
        Session::flash('add_comentario', true);

        $request->validate([
            'msg' => ['required', 'min:3']
        ], [], ['msg' => 'comentário']);
        $comentario = (new Comentario)->fill($request->all());
        $comentario->anuncio_id = $anuncio->id;
        $comentario->user_id = auth()->user()->id;
        $comentario->save();
        return redirect()->back()->withSuccess('Comentário adicionado.');
    }

    /**
     * Colaborador visualiza comentários de seus anúncios, e adm visualiza todos os comentários feitos
     *
     * @return void
     */
    public function comentarios()
    {
        if (Auth::user()->conta == 'admin') {
            // Comentários de todos os anúncios
            $comentarios = Comentario::orderBy('created_at', 'desc')->paginate(10);
        } else if (Auth::user()->conta == 'colaborador') {
            // Comantários apenas das anúncios do colaborador logado
            $comentarios = Comentario::whereHas('anuncio', function ($query) {
                return $query->where('user_id', Auth::user()->id);
            })->paginate(10);
        } else {
            // Usuário cliente não permite
            abort(403);
        }
        return view('painel.comentarios.comentarios', compact('comentarios'));
    }
}
