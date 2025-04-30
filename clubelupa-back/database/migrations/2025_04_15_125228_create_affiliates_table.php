<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAffiliatesTable extends Migration
{
    public function up()
    {
        Schema::create('affiliates', function (Blueprint $table) {
            $table->id();
            $table->string('nome_fantasia');
            $table->string('cnpj')->unique();
            // Vamos supor que o tempo de empresa seja armazenado em meses (ou anos, conforme sua necessidade)
            $table->integer('tempo_empresa');
            $table->string('telefone');
            // Status para controlar o fluxo de aprovação: pendente, aprovado, rejeitado
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('affiliates');
    }
}

