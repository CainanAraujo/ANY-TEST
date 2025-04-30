<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLocalInfoToAffiliatesTable extends Migration
{
    public function up()
    {
        Schema::table('affiliates', function (Blueprint $table) {
            // Campos para informações adicionais do local
            $table->string('nome_local')->nullable();
            $table->string('celular')->nullable();
            $table->string('horario_funcionamento')->nullable();
            $table->string('email')->nullable();
            $table->string('cep')->nullable();
            $table->string('bairro')->nullable();
            $table->string('rua')->nullable();
            $table->string('cidade')->nullable();
            $table->string('uf', 2)->nullable();
            $table->string('categoria')->nullable();
            $table->text('demais_categorias')->nullable();
            $table->string('instagram')->nullable();
            $table->string('site')->nullable();
        });
    }

    public function down()
    {
        Schema::table('affiliates', function (Blueprint $table) {
            $table->dropColumn([
                'nome_local',
                'celular',
                'horario_funcionamento',
                'email',
                'cep',
                'bairro',
                'rua',
                'cidade',
                'uf',
                'categoria',
                'demais_categorias',
                'instagram',
                'site'
            ]);
        });
    }
}
