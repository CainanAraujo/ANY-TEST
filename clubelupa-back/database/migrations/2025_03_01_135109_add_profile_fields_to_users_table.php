<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProfileFieldsToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('celular')->nullable()->after('telefone');
            $table->string('cpf')->nullable()->after('celular');
            $table->string('cep')->nullable()->after('cpf');
            $table->string('rua')->nullable()->after('cep');
            $table->string('bairro')->nullable()->after('rua');
            $table->string('cidade')->nullable()->after('bairro');
            $table->string('uf', 2)->nullable()->after('cidade');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['celular', 'cpf', 'cep', 'rua', 'bairro', 'cidade', 'uf']);
        });
    }
}
