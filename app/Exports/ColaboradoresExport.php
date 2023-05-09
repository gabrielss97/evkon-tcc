<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class ColaboradoresExport implements FromArray, WithColumnWidths
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
     * Retorno dos dados dos colaboradores
     *
     * @return void
     */
    public function dados()
    {
        $colaboradores = User::orderBy('created_at', 'desc')->where('conta', 'colaborador')->get();
        $dados = array();
        $labels = [
            'Nome', // Nome e sobrenome
            'E-mail',
            'Telefone',
            'Data de nacimento',
            'Sexo',
            'Status da conta',
            'Sobre',
        ];
        array_push($dados, $labels);
        foreach ($colaboradores as $colaborador) {
            $dadosColaborador = [
                $colaborador->nome . ' ' . $colaborador->sobrenome,
                $colaborador->email,
                $colaborador->telefone,
                date('d/m/Y', strtotime($colaborador->dt_nasc)),
                $colaborador->sexo,
                ucfirst($colaborador->status),
                $colaborador->sobre,
            ];
            array_push($dados, $dadosColaborador);
        }
        return $dados;
    }
}
