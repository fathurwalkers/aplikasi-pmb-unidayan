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
use App\Models\Prodi;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index');
    }

    public function pendaftaran()
    {
        $prodi = Prodi::all();
        return view('home.pendaftaran', [
            'prodi' => $prodi
        ]);
    }

    public function post_pendaftaran(Request $request)
    {
        $pilihan_jurusan1 = Prodi::find(intval($request->data_pilihan_jurusan1));
        $pilihan_jurusan2 = Prodi::find(intval($request->data_pilihan_jurusan2));
        $pilihan_jurusan3 = Prodi::find(intval($request->data_pilihan_jurusan3));

        $data = new Data;
        dd($request);
    }
}
