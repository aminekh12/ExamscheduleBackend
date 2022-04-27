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
        Schema::create('examens', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->datetime('heure');
            $table->unsignedBigInteger('idmatiere');
            $table->foreign('idmatiere')->references('id')->on('matieres');
            $table->unsignedBigInteger('idsalle');
            $table->foreign('idsalle')->references('id')->on('salles');

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
        Schema::dropIfExists('examens');
    }
};
