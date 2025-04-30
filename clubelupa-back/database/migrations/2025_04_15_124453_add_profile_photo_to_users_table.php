<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProfilePhotoToUsersTable extends Migration
{
    /**
     * Executa as migrações.
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Adiciona a coluna profile_photo após a coluna email (pode ser adaptado se desejar)
            $table->string('profile_photo')->nullable()->after('email');
        });
    }

    /**
     * Reverte as migrações.
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('profile_photo');
        });
    }
}
