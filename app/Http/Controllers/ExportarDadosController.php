<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Anuncio;
use Illuminate\Http\Request;
use App\Exports\AnunciosExport;
use App\Exports\ClientesExport;
use App\Exports\ColaboradoresExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportarDadosController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'can:admin']);
    }
        
    /**
     * Página com dados para exportar
     *
     * @return void
     */
    public function exportarDados()
    {
        $dados = [
            'num_colaboradores' => User::where('conta', 'colaborador')->count(),
            'num_clientes' => User::where('conta', 'cliente')->count(),
            'num_anuncios' => Anuncio::count(),
        ];
        return view('painel.exportar.exportar', $dados);
    }

    public function exportColaboradores()
    {
        return Excel::download(new ColaboradoresExport, 'Colaboradores' . date('Y-m-d') . '.xlsx');
    }

    public function exportClientes()
    {
        return Excel::download(new ClientesExport, 'Clientes' . date('Y-m-d') . '.xlsx');
    }
    
    public function exportAnuncios()
    {
        return Excel::download(new AnunciosExport, 'Anúncios' . date('Y-m-d') . '.xlsx');
    }
}
