<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('sobrenome')->nullable();
            $table->string('email')->unique();
            $table->enum('conta', ['admin', 'colaborador', 'cliente'])->default('cliente');
            $table->enum('sexo', ['Masculino', 'Feminino', 'Outro', 'null'])->default('null');
            $table->date('dt_nasc')->nullable();
            $table->string('telefone')->nullable();
            $table->string('foto')->nullable();
            $table->longText('sobre')->nullable();
            $table->enum('status', ['ativo', 'desativado'])->default('ativo');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();

            // Laravel Socialite
            $table->string('provider')->nullable();
            $table->string('provider_id')->nullable();
            $table->string('provider_token')->nullable();
            $table->string('provider_refresh_token')->nullable();

            
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
