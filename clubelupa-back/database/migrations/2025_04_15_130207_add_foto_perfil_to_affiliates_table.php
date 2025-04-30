<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFotoPerfilToAffiliatesTable extends Migration
{
    public function up()
    {
        Schema::table('affiliates', function (Blueprint $table) {
            $table->string('foto_perfil')->nullable();
        });
    }

    public function down()
    {
        Schema::table('affiliates', function (Blueprint $table) {
            $table->dropColumn('foto_perfil');
        });
    }
}
