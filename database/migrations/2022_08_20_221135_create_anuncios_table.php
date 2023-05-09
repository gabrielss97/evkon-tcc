<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnunciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anuncios', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->text('imgs'); // json com path de imagens
            $table->string('local_lat_lng');
            $table->longText('descricao_local');
            $table->longText('descricao_servico');
            $table->decimal('preco', 12, 2);
            $table->string('tempo_resposta');
            $table->string('estado')->nullable();
            $table->string('cidade')->nullable();
            $table->foreignId('categoria_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Colaborador que criou o anúncio
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
        Schema::dropIfExists('anuncios');
    }
}
