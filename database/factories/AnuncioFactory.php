<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AnuncioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $imgs = [
            'assets/img/ilu_eventos_8.jpg',
            'assets/img/ilu_eventos_2.jpg',
            'assets/img/ilu_eventos_3.jpg',
            'assets/img/ilu_eventos_6.jpg',
            'assets/img/ilu_eventos_7.jpg',
        ];
        shuffle($imgs);

        return [
            'titulo' => $this->faker->sentence(5),
            'imgs' => json_encode($imgs),
            'local_lat_lng' => '{"lat":"-22.9874631613474","lng":"-43.198052912537335"}',
            'descricao_local' => $this->faker->text(500),
            'descricao_servico' => $this->faker->text(500),
            'preco' => rand(100, 5000),
            'tempo_resposta' => '2h',
            'estado' => 'RJ',
            'cidade' => 'Rio de Janeiro',
            'categoria_id' => $this->faker->randomElement([1, 2, 3, 4]),
            'user_id' => 2,
            'created_at' => $this->faker->dateTimeBetween('- 11 months'),
        ];
    }
}
