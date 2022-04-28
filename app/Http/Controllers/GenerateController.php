<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Illuminate\Support\Arr;
use App\Models\Login;
use App\Models\Data;
use App\Models\Informasi;
use App\Models\Prodi;

class GenerateController extends Controller
{
    public function generate_informasi()
    {
        $faker                  = Faker::create('id_ID');
        $array_number = [5, 6, 7, 8];
        for ($i=0; $i < 20; $i++) {
            $informasi_model            = new Informasi;
            $informasi_kode             = Str::random(16);
            $informasi_title = $faker->sentence(Arr::random($array_number), false);
            $informasi_body = $faker->paragraph(Arr::random($array_number),false);
            $informasi_Waktu = $faker->date();

            $save_informasi = $informasi_model->create([
                "informasi_kode" => $informasi_kode,
                "informasi_title" => $informasi_title,
                "informasi_body" => $informasi_body,
                "informasi_waktu" => $informasi_Waktu,
                "created_at" => now(),
                "updated_at" => now()
            ]);
            $save_informasi->save();
        }
        $informasi_all = Informasi::all();
        dd($informasi_all);
    }

    public function generate_mahasiswa()
    {
        $faker                  = Faker::create('id_ID');
        for ($i = 0; $i < 25; $i++) {
            // DATA MAHASISWA
            $arr_jenis_kelamin  = ["L", "P"];
            $arr_status_pendaftaran = ["DISETUJUI", "BELUM DISETUJUI"];
            $arr_status_pembayaran = ["DIPROSES", "SELESAI", "DIBATALKAN"];
            $arr_number  = [1, 2, 3];
            $arr_sekolah = [
                "SMA 1 Baubau",
                "SMA 2 Baubau",
                "SMA 3 Baubau",
                "SMA 4 Baubau",
                "SMA 5 Baubau",
                "SMK 1 Baubau",
                "SMK 2 Baubau",
                "SMK 3 Baubau",
                "SMK 4 Baubau",
                "MAN 1 Baubau",
                "MAN 2 Baubau"
            ];
            $arr_kampus_pilihan = [
                'KAMPUS PASARWAJO',
                'KAMPUS PALAGIMATA'
            ];
            $prodi1 = Prodi::all()->toArray();
            $random_pilihan_jurusan1 = Arr::random($prodi1);
            $prodi2 = Prodi::whereNotIn('id', [$random_pilihan_jurusan1["id"]])->get()->toArray();
            $random_pilihan_jurusan2 = Arr::random($prodi2);
            $prodi3 = Prodi::whereNotIn('id', [$random_pilihan_jurusan1["id"], $random_pilihan_jurusan2["id"]])->get()->toArray();
            $random_pilihan_jurusan3 = Arr::random($prodi3);

            $random_kampus_pilihan = Arr::random($arr_kampus_pilihan);
            $random_status_pendaftaran = Arr::random($arr_status_pendaftaran);
            $random_status_pembayaran = Arr::random($arr_status_pembayaran);
            $random_number = Arr::random($arr_number);
            $random_sekolah = Arr::random($arr_sekolah);
            $random_jenis_kelamin = Arr::random($arr_jenis_kelamin);
            $nama_ibu_kandung = $faker->firstNameFemale() . " " . $faker->lastNameFemale();

            switch ($random_jenis_kelamin) {
                case 'L':
                    $data_foto = "male.jpg";
                    $nama_depan = $faker->firstNameMale();
                    $nama_belakang = $faker->lastNameMale();
                    $nama_lengkap = $nama_depan . " " . $faker->words($random_number, true) . " " . $nama_belakang;
                    break;
                case 'P':
                    $data_foto = "female.jpg";
                    $nama_depan = $faker->firstNameFemale();
                    $nama_belakang = $faker->lastNameFemale();
                    $nama_lengkap = $nama_depan . " " . $faker->words($random_number, true) . " " . $nama_belakang;
                    break;
            }

            $data_mahasiswa = new Data;
            $save_mahasiswa = $data_mahasiswa->create([
                'data_foto' => $data_foto,
                'data_kode' => strtoupper(Str::random(10)),
                'data_nama_lengkap' => $nama_lengkap,
                'data_jenis_kelamin' => $random_jenis_kelamin,
                'data_email' => $faker->email(),
                'data_telepon' => $faker->phoneNumber(),
                'data_tempat_lahir' => $faker->city(),
                'data_tanggal_lahir' => $faker->date(),
                'data_asal_sekolah' => $random_sekolah,
                'data_nama_ibu_kandung' => $nama_ibu_kandung,
                'data_tahun_lulus' => intval($faker->year()),
                'data_status_pendaftaran' => $random_status_pendaftaran,
                'data_status_pembayaran' => $random_status_pembayaran,
                'data_kampus_pilihan' => $random_kampus_pilihan,
                'data_pilihan_jurusan1' => intval($random_pilihan_jurusan1["id"]),
                'data_pilihan_jurusan2' => intval($random_pilihan_jurusan2["id"]),
                'data_pilihan_jurusan3' => intval($random_pilihan_jurusan3["id"]),
                'created_at' => now(),
                'updated_at' => now()
            ]);
            $save_mahasiswa->save();

            // LOGIN
            $login_model            = new Login;
            $password               = '12345';
            $hashPassword           = Hash::make($password, [
                'rounds' => 12,
            ]);
            $token_raw              = Str::random(16);
            $token                  = Hash::make($token_raw, [
                'rounds' => 12,
            ]);
            $level                  = "pendaftar";
            $login_status           = "verified";
            $login_data = $login_model->create([
                'login_nama'        => $save_mahasiswa->data_nama_lengkap,
                'login_username'    => 'pendaftar' . $i . strtoupper(Str::random(5)),
                'login_password'    => $hashPassword,
                'login_email'       => $save_mahasiswa->data_email,
                'login_telepon'     => $save_mahasiswa->data_telepon,
                'login_token'       => $token,
                'login_level'       => $level,
                'login_status'      => $login_status,
                'created_at'        => now(),
                'updated_at'        => now()
            ]);
            $login_data->save();
            $login_data->data()->associate($save_mahasiswa->id);
            $login_data->save();
        }
        return redirect()->route('data-mahasiswa');
    }
}
