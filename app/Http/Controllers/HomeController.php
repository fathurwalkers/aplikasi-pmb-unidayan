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

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index');
    }

    public function pendaftaran()
    {
        return view('home.pendaftaran');
    }
}
