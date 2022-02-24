<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataTable extends Migration
{
    public function up()
    {
        Schema::create('data_mahasiswa', function (Blueprint $table) {
            $table->id();

            $table->string('data_nama_lengkap')->nullable();
            $table->string('data_email')->nullable();
            $table->string('data_telepon')->nullable();
            $table->string('data_tempat_lahir')->nullable();
            $table->date('data_tanggal_lahir')->nullable();
            $table->string('data_asal_sekolah')->nullable();
            $table->string('data_tahun_lulus')->nullable();
            $table->string('data_plihan_jurusan1')->nullable();
            $table->string('data_plihan_jurusan2')->nullable();
            $table->string('data_plihan_jurusan3')->nullable();
            $table->string('data_status_pendaftaran')->nullable(); // DISETUJUI / BELUM DISETUJUI
            $table->string('data_status_pembayaran')->nullable(); // DIPROSES / SELESAI / BATAL

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('data_mahasiswa');
    }
}
