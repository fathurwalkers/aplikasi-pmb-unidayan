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

class GenerateController extends Controller
{
    public function generate_mahasiswa()
    {
        $faker                  = Faker::create('id_ID');
        for ($i = 0; $i < 10; $i++) {

            // DATA MAHASISWA
            $arr_jenis_kelamin  = ["L", "P"];
            $arr_status_pendaftaran = ["DISETUJUI", "BELUM DISETUJUI"];
            $arr_status_pembayaran = ["DIPROSES", "SELESAI", "DIBATALKAN"];
            $arr_number  = [1, 2, 3];
            $arr_jurusan = [
                "Teknik Informatika",
                "Teknik Sipil",
                "Teknik Pertambangan",
                "Teknik Mesin",
                "Sastra Inggris",
                "Sastra Indonesia",
                "Perikanan",
                "Hukum",
                "Ekonomi",
                "Akuntansi",
                "Administrasi Negara",
                "Sistem Informasi"
            ];
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

            $random_status_pendaftaran = Arr::random($arr_status_pendaftaran);
            $random_status_pembayaran = Arr::random($arr_status_pembayaran);
            $random_number = Arr::random($arr_number);
            $random_jurusan = Arr::random($arr_jurusan, 3);
            $random_sekolah = Arr::random($arr_sekolah);
            $random_jenis_kelamin = Arr::random($arr_jenis_kelamin);

            switch ($random_jenis_kelamin) {
                case 'L':
                    $data_foto = "default-img/male.jpg";
                    $nama_depan = $faker->firstNameMale();
                    $nama_belakang = $faker->lastNameMale();
                    $nama_lengkap = $nama_depan . " " . $faker->words($random_number, true) . " " . $nama_belakang;
                    break;
                case 'P':
                    $data_foto = "default-img/female.jpg";
                    $nama_depan = $faker->firstNameFemale();
                    $nama_belakang = $faker->lastNameFemale();
                    $nama_lengkap = $nama_depan . " " . $faker->words($random_number, true) . " " . $nama_belakang;
                    break;
            }

            $data_mahasiswa = new Data;
            $save_mahasiswa = $data_mahasiswa->create([
                'data_foto' => $data_foto,
                'data_nama_lengkap' => $nama_lengkap,
                'data_jenis_kelamin' => $random_jenis_kelamin,
                'data_email' => $faker->email(),
                'data_telepon' => $faker->phoneNumber(),
                'data_tempat_lahir' => $faker->city(),
                'data_tanggal_lahir' => $faker->date(),
                'data_asal_sekolah' => $random_sekolah,
                'data_tahun_lulus' => $faker->year(),
                'data_plihan_jurusan1' => $random_jurusan[0],
                'data_plihan_jurusan2' => $random_jurusan[1],
                'data_plihan_jurusan3' => $random_jurusan[2],
                'data_status_pendaftaran' => $random_status_pendaftaran,
                'data_status_pembayaran' => $random_status_pembayaran,
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
