<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Illuminate\Support\Arr;
use App\Models\Login;
use App\Models\Data;
use Livewire\Component;
use App\Models\Histori;

class DashboardUserPanel extends Component
{
    public function render()
    {
        return view('livewire.dashboard-user-panel');
    }

    public function logout(Request $request)
    {
        $session_users = session('data_login');
        if ($session_users == null) {
            return redirect()->route('dashboard')->with('status', 'Maaf session user anda tidak ditemukan.');
        }
        $histori = new Histori;
        $login = Login::find(intval($session_users->id));

        $status_histori = "LOGOUT";
        $status_histori = "User Logout";
        $histori_kode = "HSTR" . strtoupper(Str::random(10));
        $message = "User dengan nama [" . $login->login_nama . "] telah logout, pada tanggal dan waktu ini : " . date('d/m/Y H:i:s', strtotime(now()));

        $save_histori = $histori->create([
            "histori_kode" => $histori_kode,
            "histori_tipe"  => $status_histori,
            "histori_title" => $message,
            "histori_tanggal_waktu" => now(),
            "created_at" => now(),
            "updated_at" => now()
        ]);
        $save_histori->save();
        $save_histori->login()->associate($login->id);
        $save_histori->save();
        $request->session()->forget(['data_login']);
        $request->session()->flush();
        return redirect()->route('login')->with('status', 'Anda berhasil Logout!');
    }
}
