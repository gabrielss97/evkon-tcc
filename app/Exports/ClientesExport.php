<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class ClientesExport implements FromArray, WithColumnWidths
{
    public function array(): array
    {
        return $this->dados();
    }

    public function columnWidths(): array
    {
        return [
            'A' => 30,
            'B' => 33,
            'C' => 20,
            'D' => 20,
            'E' => 20,
            'E' => 20,
            'F' => 20,
            'G' => 30,
        ];
    }

    /**
     * Retorno dos dados dos clientes
     *
     * @return void
     */
    public function dados()
    {
        $clientes = User::orderBy('created_at', 'desc')->where('conta', 'cliente')->get();
        $dados = array();
        $labels = [
            'Nome', // Nome e sobrenome
            'E-mail',
            'Telefone',
            'Data de nacimento',
            'Sexo',
            'Status da conta',
        ];
        array_push($dados, $labels);
        foreach ($clientes as $cliente) {
            $dadosCliente = [
                $cliente->nome . ' ' . $cliente->sobrenome,
                $cliente->email,
                $cliente->telefone,
                date('d/m/Y', strtotime($cliente->dt_nasc)),
                $cliente->sexo,
                ucfirst($cliente->status),
            ];
            array_push($dados, $dadosCliente);
        }
        return $dados;
    }
}
