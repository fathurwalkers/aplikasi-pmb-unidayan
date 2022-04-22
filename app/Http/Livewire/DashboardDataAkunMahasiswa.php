<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Login;
use App\Models\Data;
use Illuminate\Support\Str;

class DashboardDataAkunMahasiswa extends Component
{
    public $akun_mahasiswa;
    public $contentheader;

    protected $listeners = ['hapus' => 'hapusData'];

    public function render()
    {
        $this->contentheader = "Data Akun Mahasiswa";
        $this->akun_mahasiswa = Login::where('login_level', 'pendaftar')->latest()->get();
        return view('livewire.dashboard-data-akun-mahasiswa')
        ->extends('layouts.admin-layout')
        ->section('main-content');
    }

    public function hapusData($id)
    {
        $akun_id = $id;
        $findUser = Login::findOrFail($akun_id);
        $findDataUser = Data::findOrFail($findUser->data_id);
        $findDataUser->forceDelete();
        return redirect()->route('data-akun-mahasiswa')->with('status', 'Data telah dihapus!');
    }
}
