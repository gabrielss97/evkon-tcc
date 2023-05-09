<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Anuncio;
use Illuminate\Http\Request;
use PDF;

class EstatisticasController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'can:admin']);
    }

    /**
     * Ver estatísticas
     *
     * @return void
     */
    public function estatisticas()
    {
        $usuariosAtivos = [
            'clientes' => User::where('conta', 'cliente')->where('status', 'ativo')->count(),
            'colaboradores' => User::where('conta', 'colaborador')->where('status', 'ativo')->count(),
            'total' => User::whereIn('conta', ['cliente', 'colaborador'])->where('status', 'ativo')->count(),
        ];

        $usuariosBanidos = [
            'clientes' => User::where('conta', 'cliente')->where('status', 'desativado')->count(),
            'colaboradores' => User::where('conta', 'colaborador')->where('status', 'desativado')->count(),
            'total' => User::whereIn('conta', ['cliente', 'colaborador'])->where('status', 'desativado')->count(),
        ];

        $estatisticas = [
            'usuarios_ativos' => $usuariosAtivos,
            'usuarios_banidos' => $usuariosBanidos,
            'colaboradores_ano' => $this->colaboradoresAno(),
            'clientes_ano' => $this->clientesAno(),
            'anuncios_ano' => $this->anunciosAno(),
        ];

        return view('painel.estatisticas.estatisticas', $estatisticas);
    }

    public function pdf(Request $request)
    {

        $data = [
            'foo' => 'bar'
        ];
        $pdf = PDF::loadView('painel.estatisticas.pdf', $data);
        return $pdf->download('pdf-estatisticas.pdf');

        return view('painel.estatisticas.pdf');
    }

    /**
     * Colaboradores cadastrados em 1 ano
     *
     * @return void
     */
    public function colaboradoresAno()
    {
        $meses =  ['', 'Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'];

        $labels = [];
        $data = [];

        $mesInicio = 0;
        for ($i = 1; $i <= 12; $i++) {
            array_push($labels, $meses[date('n', strtotime(date('Y-m-01') . "- $mesInicio months"))]);
            $refAno = date('Y', strtotime(date('Y-m-01') . "- $mesInicio months"));
            $refMes = date('n', strtotime(date('Y-m-01') . "- $mesInicio months"));

            $data[] = User::where('conta', 'colaborador')->whereYear('created_at', $refAno)->whereMonth('created_at', $refMes)->count();

            $mesInicio += 1;
        }

        return [
            'labels' => array_reverse($labels),
            'data' => array_reverse($data),
        ];
    }

    /**
     * Clientes Cadastrados em 1 ano
     *
     * @return void
     */
    public function clientesAno()
    {
        $meses =  ['', 'Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'];

        $labels = [];
        $data = [];

        $mesInicio = 0;
        for ($i = 1; $i <= 12; $i++) {
            array_push($labels, $meses[date('n', strtotime(date('Y-m-01') . "- $mesInicio months"))]);
            $refAno = date('Y', strtotime(date('Y-m-01') . "- $mesInicio months"));
            $refMes = date('n', strtotime(date('Y-m-01') . "- $mesInicio months"));

            $data[] = User::where('conta', 'cliente')->whereYear('created_at', $refAno)->whereMonth('created_at', $refMes)->count();

            $mesInicio += 1;
        }

        return [
            'labels' => array_reverse($labels),
            'data' => array_reverse($data),
        ];
    }

    /**
     * Anúncios Cadastrados em 1 ano
     *
     * @return void
     */
    public function anunciosAno()
    {
        $meses =  ['', 'Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'];

        $labels = [];
        $data = [];

        $mesInicio = 0;
        for ($i = 1; $i <= 12; $i++) {
            array_push($labels, $meses[date('n', strtotime(date('Y-m-01') . "- $mesInicio months"))]);
            $refAno = date('Y', strtotime(date('Y-m-01') . "- $mesInicio months"));
            $refMes = date('n', strtotime(date('Y-m-01') . "- $mesInicio months"));

            $data[] = Anuncio::whereYear('created_at', $refAno)->whereMonth('created_at', $refMes)->count();

            $mesInicio += 1;
        }

        return [
            'labels' => array_reverse($labels),
            'data' => array_reverse($data),
        ];
    }
}
