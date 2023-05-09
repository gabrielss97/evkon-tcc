<?php

namespace App\Http\Controllers;

use App\Models\Contato;
use Illuminate\Http\Request;

class ContatoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => [
            'entrarEmContato', 'contatoEnviar',
        ]]);
    }

    /**
     * Página pra enviar msg de contato
     *
     * @return void
     */
    public function entrarEmContato()
    {
        return view('contato');
    }

    /**
     * Salvar msg de contato no banco de dados
     *
     * @param  mixed $request
     * @return void
     */
    public function contatoEnviar(Request $request)
    {
        $request->validate([
            'nome' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'mensagem' => ['required']
        ]);

        $contato = (new Contato)->fill($request->all());
        $contato->save();

        return redirect()->back()->withSuccess(true);
    }

    /**
     * Página com lista de contatos enviados, apenas admin tem acesso
     *
     * @return void
     */
    public function contatos()
    {
        $this->authorize('admin');
        $contatos = Contato::orderBy('created_at', 'desc')->paginate(10);
        return view('painel.contatos.contatos', compact('contatos'));
    }
    
    /**
     * Visualizar contato enviado
     *
     * @param  mixed $contato
     * @return void
     */
    public function visualizarContato(Contato $contato)
    {
        $this->authorize('admin');
        $contato->status = 'visualizado';
        $contato->save();
        return view('painel.contatos.visualizar_contato', compact('contato'));
    }

    /**
     * Atualizar status de contato de 'novo' para 'visualizado'
     *
     * @param  mixed $contato
     * @return void
     */
    public function addVisualizado(Contato $contato)
    {
        $this->authorize('admin');
        $contato->status = 'visualizado';
        $contato->save();
        return redirect()->back()->withSuccess('Contato visualizado');
    }

    /**
     * Remover contato
     *
     * @param  mixed $contato
     * @return void
     */
    public function destroy(Contato $contato)
    {
        $this->authorize('admin');
        $contato->delete();
        return redirect()->route('contatos')->withSuccess('Contato removido.');
    }
}
