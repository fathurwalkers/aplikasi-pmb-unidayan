<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdisTable extends Migration
{
    public function up()
    {
        Schema::create('prodi', function (Blueprint $table) {
            $table->id();

            $table->string('prodi_kode')->nullable();
            $table->string('prodi_nama')->nullable();
            $table->string('prodi_tingkatan')->nullable(); // S1 - S2
            $table->string('prodi_foto_pimpinan')->nullable();
            $table->string('prodi_nama_pimpinan')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('prodi');
    }
}
