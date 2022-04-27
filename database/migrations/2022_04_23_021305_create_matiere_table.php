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
        Schema::create('matieres', function (Blueprint $table) {
            $table->id();
            $table->string('matiere')->unique();
            $table->string('typesalle');
            $table->unsignedBigInteger('idprofesseur');
            $table->foreign('idprofesseur')->references('id')->on('professeurs');
            $table->unsignedBigInteger('idniveau');
            $table->foreign('idniveau')->references('id')->on('niveaus');
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
        Schema::dropIfExists('matieres');
    }
};
