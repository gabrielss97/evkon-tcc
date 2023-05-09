<?php

namespace App\Exports;

use App\Models\User;
use App\Models\Anuncio;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class AnunciosExport implements FromArray, ShouldAutoSize
{
    public function array(): array
    {
        return $this->dados();
    }

    /**
     * Retorno dos dados dos anuncios
     *
     * @return void
     */
    public function dados()
    {
        $anuncios = Anuncio::orderBy('created_at', 'desc')->get();
        $dados = array();
        $labels = [
            'Título',
            'Mapa', // Url do mapa, https://maps.google.com/maps?q=-22.9874631613474,-43.198052912537335&t=k&z=16
            'Estado',
            'Cidade',
            'Descricão do Local',
            'Descricão do Serviço',
            'Categoria',
            'Preço',
            'Data de criação',
            'Dono do Anúncio', // nome (id 234)
        ];
        array_push($dados, $labels);
        foreach ($anuncios as $anuncio) {
            $lat = $anuncio->local_lat_lng ? json_decode($anuncio->local_lat_lng)->lat : null;
            $lng = $anuncio->local_lat_lng ? json_decode($anuncio->local_lat_lng)->lng : null;
            $dadosAnuncio = [
                $anuncio->titulo,
                "https://maps.google.com/maps?q=" . $lat . "," . $lng . "&t=k&z=16",
                $anuncio->estado,
                $anuncio->cidade,
                $anuncio->descricao_local,
                $anuncio->descricao_servico,
                $anuncio->categoria->nome,
                'R$ ' . number_format($anuncio->preco, 2, ',', '.'),
                $anuncio->created_at->format('d/m/Y'),
                $anuncio->user->nome . ' ' . $anuncio->user->sobrenome . ' (Id ' . $anuncio->user_id . ')',
            ];
            array_push($dados, $dadosAnuncio);
        }

        return $dados;
    }
}
