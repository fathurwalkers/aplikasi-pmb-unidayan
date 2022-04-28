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
use App\Models\Histori;
use App\Models\Informasi;

class AdminController extends Controller
{
    public function save_informasi(Request $request)
    {
        $informasi = new Informasi;
        $informasi_kode = "INFO" . strtoupper(Str::random(5));
        $save_informasi = $informasi->create([
            "informasi_kode" => $informasi_kode,
            "informasi_title" => $request->informasi_title,
            "informasi_body" => $request->informasi_body,
            "informasi_waktu" => date(now()),
            "created_at" => now(),
            "updated_at" => now()
        ]);
        $save_informasi->save();
        return redirect()->route('data-informasi')->with('status', 'Berhasil menambahkan informasi baru.');
    }
}
