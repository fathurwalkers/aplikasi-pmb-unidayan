<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Login;
use Illuminate\Support\Str;

class DashboardDataAkunMahasiswa extends Component
{
    public $akun_mahasiswa;
    public $contentheader;

    protected $listeners = ['hapus' => 'hapusData'];

    public function render()
    {
        $this->contentheader = "Data Mahasiswa";
        $this->akun_mahasiswa = Login::where('login_level', 'pendaftar')->latest()->get();
        return view('livewire.dashboard-data-akun-mahasiswa')
        ->extends('layouts.admin-layout')
        ->section('main-content');
    }

    public function hapusData($akun_id)
    {
        $id = $akun_id;
        $findUser = Login::findOrFail($id);
        $findUser->forceDelete();
        return redirect()->route('data-akun-mahasiswa')->with('status', 'Data telah dihapus!');
    }
}
