<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Informasi;

class DashboardDataInformasi extends Component
{
    public function render()
    {
        return view('livewire.dashboard-data-informasi')
        ->extends('layouts.admin-layout')
        ->section('main-content');
    }

    public function hapusData($akun_id)
    {
        $id = $akun_id;
        $find_informasi = Informasi::findOrFail($id);
        $find_informasi->forceDelete();
        return redirect()->route('data-akun-mahasiswa')->with('status', 'Data telah dihapus!');
    }
}
