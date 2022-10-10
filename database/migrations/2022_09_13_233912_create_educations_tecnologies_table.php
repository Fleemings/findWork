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
        Schema::create('educations_tecnologies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('education_id')->references('id')->on('educations')->cascadeOnDelete();
            $table->foreignId('tecnology_id')->references('id')->on('tecnologies')->cascadeOnDelete();
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
        Schema::dropIfExists('educations_tecnologies');
    }
};
