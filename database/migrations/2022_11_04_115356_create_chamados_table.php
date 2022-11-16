<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chamados', function (Blueprint $table) {
            $table->id();
            $table->text('titulo');
            $table->char('descricao', 250);
            $table->text('os');
            $table->text('mnemonico_shift');
            $table->text('mnemonico_apoio')->nullable();
            $table->text('prioridade_id');
            $table->json('imagens')->nullable();
            $table->integer('usuario_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chamados');
    }
};
