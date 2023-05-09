<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Anuncio;
use App\Models\Comentario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $anuncios = Anuncio::orderBy('created_at', 'desc')->limit(8)->get();
        $meusAnuncios = Anuncio::orderBy('created_at', 'desc')->where('user_id', Auth::user()->id)->limit(6)->get();

        
        $comentariosParaColaborador = Comentario::orderBy('created_at', 'desc')->whereHas('anuncio', function ($query) {
            return $query->where('user_id', Auth::user()->id);
        })->limit(6)->get();
        
        $colaboradores = User::orderBy('created_at', 'desc')->where('conta', 'colaborador')->limit(6)->get();
        $clientes = User::orderBy('created_at', 'desc')->where('conta', 'cliente')->limit(6)->get();
        
        return view('painel.home', compact('anuncios', 'meusAnuncios', 'comentariosParaColaborador', 'colaboradores', 'clientes'));
    }
}
