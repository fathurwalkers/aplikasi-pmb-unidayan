<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistorisTable extends Migration
{
    public function up()
    {
        Schema::create('histori', function (Blueprint $table) {
            $table->id();
            $table->string('histori_kode');
            $table->string('histori_tipe'); // USER LOGIN - EDIT DATA - UPDATE DATA - HAPUS DATA
            $table->string('histori_title');
            $table->dateTime('histori_tanggal_waktu');

            $table->unsignedBigInteger('login_id')->nullable()->default(null);
            $table->foreign('login_id')->references('id')->on('login')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('histori');
    }
}
