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

            $table->string('data_foto')->nullable();
            $table->string('data_kode')->nullable();
            $table->string('data_nama_lengkap')->nullable();
            $table->string('data_jenis_kelamin')->nullable();
            $table->string('data_email')->nullable()->unique();
            $table->string('data_telepon')->nullable();
            $table->string('data_tempat_lahir')->nullable();
            $table->dateTime('data_tanggal_lahir')->nullable();
            $table->string('data_asal_sekolah')->nullable();
            $table->string('data_nama_ibu_kandung')->nullable();
            $table->string('data_tahun_lulus')->nullable();
            $table->string('data_status_pendaftaran')->nullable(); // DISETUJUI / BELUM DISETUJUI
            $table->string('data_status_pembayaran')->nullable(); // DIPROSES / SELESAI / DIBATALKAN
            $table->string('data_kampus_pilihan')->nullable();

            $table->unsignedBigInteger('data_pilihan_jurusan1')->nullable()->default(null);
            $table->foreign('data_pilihan_jurusan1')->references('id')->on('prodi')->onDelete('cascade');

            $table->unsignedBigInteger('data_pilihan_jurusan2')->nullable()->default(null);
            $table->foreign('data_pilihan_jurusan2')->references('id')->on('prodi')->onDelete('cascade');

            $table->unsignedBigInteger('data_pilihan_jurusan3')->nullable()->default(null);
            $table->foreign('data_pilihan_jurusan3')->references('id')->on('prodi')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('data_mahasiswa');
    }
}
