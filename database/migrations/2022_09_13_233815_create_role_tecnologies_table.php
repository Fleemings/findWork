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
        Schema::create('role_tecnologies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('roles_id')->references('id')->on('roles')->cascadeOnDelete();
            $table->foreignId('tecnologies_id')->references('id')->on('tecnologies')->cascadeOnDelete();
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
        Schema::dropIfExists('role_tecnologies');
    }
};
