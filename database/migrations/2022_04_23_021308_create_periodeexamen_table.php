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
        Schema::create('periodeexamens', function (Blueprint $table) {
            $table->id();
            $table->date('datedebut');
            $table->date('datefin');
            $table->unsignedBigInteger('idexamen');
            $table->foreign('idexamen')->references('id')->on('examens');
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
        Schema::dropIfExists('periodeexamens');
    }
};
