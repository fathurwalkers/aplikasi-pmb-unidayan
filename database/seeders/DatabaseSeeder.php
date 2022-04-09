<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Illuminate\Support\Arr;
use App\Models\Login;
use App\Models\Prodi;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID');

        // =======================================================================================
        $prodi = new Prodi;
        $array_prodi_pimpinan = [
            "Drs. Ilham, M.Si.",
            "Hartini Amin, S.Sos., M.Si.",
            "Haeruddin, S.Pd., M.A.",
            "La Sariade, S.Pd., M.Pd.",
            "La Eru Ugi, S.Pd,M.Pd",
            "Rizal Arisman, S.Pd., M.Pd.",
            "Iip Irawan Hisanuddin, S.E., M.M.",
            "Said Saleh Salihi, MSA,S.E.,Ak",
            "Sumitro, S.Pi., M.Si.",
            "Nasrin, S.H., M.H.",
            "La Ode Asman Muriman, S.T., M.T.",
            "Ahmad Gasruddin, S.T., M.T.",
            "Ery Muchyar Hasiri, S.Kom., M.T.",
            "Sarman, S.T., M.T.",
            "La Ode Muh. Taufiq, SKM., M.Kes.",
            "Badaria, S.Si., M.Sc.",
            "Dr. La Didi, S.I.P., MAP",
            "Dr. Juamdan Zamha Zamihu, S.S., M.Hum."
        ];
        $array_prodi_nama = [
            "Ilmu Administrasi Negara",
            "Sosiologi",
            "Pendidikan Sejarah",
            "Pendidikan Ekonomi",
            "Pendidikan Matematika",
            "Pendidikan Bahasa Inggris",
            "Manajemen",
            "Akuntansi",
            "Budidaya Perairan",
            "Ilmu Hukum",
            "Teknik Mesin",
            "Teknik Sipil",
            "Teknik Informatika",
            "Teknik Pertambangan",
            "Kesehatan Masyarakat",
            "Agroteknologi",
            "Ilmu Administrasi Negara",
            "Pendidikan Bahasa Inggris"
        ];
        $array_prodi_tingkatan = [
            "S1",
            "S1",
            "S1",
            "S1",
            "S1",
            "S1",
            "S1",
            "S1",
            "S1",
            "S1",
            "S1",
            "S1",
            "S1",
            "S1",
            "S1",
            "S1",
            "S2",
            "S2"
        ];
        $count_prodi = count($array_prodi_nama);
        for ($i=0; $i < $count_prodi; $i++) {
            $prodi_kode = "PRODI" . strtoupper(Str::random(5));
            $save_prodi = $prodi->create([
                "prodi_kode" => $prodi_kode,
                "prodi_nama" => $array_prodi_nama[$i],
                "prodi_tingkatan" => $array_prodi_tingkatan[$i],
                "prodi_foto_pimpinan" => "home-default-profile.jpg",
                "prodi_nama_pimpinan" => $array_prodi_pimpinan[$i],
                "created_at" => now(),
                "updated_at" => now()
            ]);
            $save_prodi->save();
        }
        // ===========================================================================================

        // ADMIN
        $token = Str::random(16);
        $role = "admin";
        $hashPassword = Hash::make('admin', [
            'rounds' => 12,
        ]);
        $hashToken = Hash::make($token, [
            'rounds' => 12,
        ]);
        Login::create([
            'login_nama' => 'Administrator',
            'login_username' => 'admin',
            'login_password' => $hashPassword,
            'login_email' => 'administrator@pmb-unidayan.com',
            'login_telepon' => '085944923123',
            'login_token' => $hashToken,
            'login_level' => $role,
            'login_status' => "verified",
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $token = Str::random(16);
        $role = "admin";
        $hashPassword = Hash::make('safar', [
            'rounds' => 12,
        ]);
        $hashToken = Hash::make($token, [
            'rounds' => 12,
        ]);
        Login::create([
            'login_nama' => 'safar',
            'login_username' => 'safar',
            'login_password' => $hashPassword,
            'login_email' => 'safar@gmail.com',
            'login_telepon' => '085342442385',
            'login_token' => $hashToken,
            'login_level' => $role,
            'login_status' => "verified",
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // ---------------------------------------------------------------------------

        // bidan
        $token = Str::random(16);
        $role = "panitia";
        $hashPassword = Hash::make('panitia', [
            'rounds' => 12,
        ]);
        $hashToken = Hash::make($token, [
            'rounds' => 12,
        ]);
        Login::create([
            'login_nama' => 'Panitia 1',
            'login_username' => 'panitia',
            'login_password' => $hashPassword,
            'login_email' => 'panitia@gmail.com',
            'login_telepon' => '085342072185',
            'login_token' => $hashToken,
            'login_level' => $role,
            'login_status' => "verified",
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // ---------------------------------------------------------------------------

        // User Pertama
        $token = Str::random(16);
        $role = "user";
        $hashPassword = Hash::make('user1234', [
            'rounds' => 12,
        ]);
        $hashToken = Hash::make($token, [
            'rounds' => 12,
        ]);
        Login::create([
            'login_nama' => 'User 1',
            'login_username' => 'user1',
            'login_password' => $hashPassword,
            'login_email' => 'user1@gmail.com',
            'login_telepon' => '085342072185',
            'login_token' => $hashToken,
            'login_level' => $role,
            'login_status' => "verified",
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // ---------------------------------------------------------------------------

        // User Kedua
        $token = Str::random(16);
        $role = "user";
        $hashPassword = Hash::make('user1234', [
            'rounds' => 12,
        ]);
        $hashToken = Hash::make($token, [
            'rounds' => 12,
        ]);
        Login::create([
            'login_nama' => 'User 2',
            'login_username' => 'user2',
            'login_password' => $hashPassword,
            'login_email' => 'user2@gmail.com',
            'login_telepon' => '085342072185',
            'login_token' => $hashToken,
            'login_level' => $role,
            'login_status' => "verified",
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
