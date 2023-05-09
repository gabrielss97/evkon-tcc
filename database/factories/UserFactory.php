<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->firstName(),
            'sobrenome' => $this->faker->lastName(),
            'email' => $this->faker->unique()->safeEmail(),
            'conta' => $this->faker->randomElement(['cliente', 'colaborador']),
            'sexo' => $this->faker->randomElement(['Masculino', 'Feminino', 'Outro']),
            'status' => $this->faker->randomElement(['ativo', 'desativado']),
            'email_verified_at' => now(),
            'dt_nasc' => '1990-01-01',
            'telefone' => '(99) 99999-9999',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'created_at' => $this->faker->dateTimeBetween('- 11 months'),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
