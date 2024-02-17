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
        Schema::create('komptensikeahlian', function (Blueprint $table) {
            $table->id();
            $table->string('komptensikeahlian', 200);
            $table->unsignedBigInteger('kdstandkomp');
            $table->foreign('kdstandkomp')->references('id')->on('standarkompetensi')
            ->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('komptensikeahlian');
    }
};
