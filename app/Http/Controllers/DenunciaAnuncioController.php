<?php

namespace App\Http\Controllers;

use App\Models\Anuncio;
use Illuminate\Http\Request;
use App\Models\DenunciaAnuncio;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DenunciaAnuncioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function denunciarAnuncio(Request $request, Anuncio $anuncio)
    {
        Session::flash('denunciar_anuncio', true);

        $request->validate([
            'motivo' => ['required', 'min:3'],
        ]);
        $denucia = (new DenunciaAnuncio)->fill($request->all());
        $denucia->anuncio_id = $anuncio->id;
        $denucia->user_id = Auth::user()->id; // User que denunciou
        $denucia->save();
        return redirect()->back()->withSuccess('Anúncio denunciado.');
    }

    /**
     * Denuncias anúncios, admin pode visualizar
     *
     * @return void
     */
    public function denunciasAnuncios()
    {
        $this->authorize('admin');
        $denuncias = DenunciaAnuncio::orderBy('created_at', 'desc')->paginate(10);
        return view('painel.denuncias_de_anuncios.denuncias', compact('denuncias'));
    }

    /**
     * Remover anúncio, admin e o colaborador dono pode remover
     *
     * @param  mixed $anuncio
     * @return void
     */
    public function removerAnuncio(Anuncio $anuncio)
    {
        if ($anuncio->user_id == Auth::user()->id || Auth::user()->conta == 'admin') {
            $anuncio->delete();
            return redirect()->route('denuncias-de-anuncios')->withSuccess('Comentário removido.');
        } else {
            abort(403);
        }
    }

    public function naoRemoverAnuncioDenunciado(DenunciaAnuncio $denunciaanuncio)
    {
        $this->authorize('admin');
        $denunciaanuncio->status = 'nao_removido';
        $denunciaanuncio->save();
        return redirect()->back()->withSuccess('Anúncio não removido.');
    }
}
