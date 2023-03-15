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
        Schema::table('users', function (Blueprint $table) {
            $table->string('fone', 20)->after('name'); // Ordenado após a coluna "name";
            $table->string('cpf', 20)->after('fone');
            $table->date('date_of_birth')->after('cpf');

            $table->unsignedBigInteger('profile_type_id')->after('date_of_birth');
            $table->foreign('profile_type_id')->references('id')->on('profile_type');
            
            $table->unsignedBigInteger('store_id')->after('profile_type_id');
            $table->foreign('store_id')->references('id')->on('store');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // $table->dropColumn('fone');
            // $table->dropColumn('cpf');
            // $table->dropColumn('date_of_birth');
            $table->dropForeign(['profile_type_id']);
            $table->dropForeign(['store_id']);
        });
    }
};
