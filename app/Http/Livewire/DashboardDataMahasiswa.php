<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Data;
use Illuminate\Support\Str;

class DashboardDataMahasiswa extends Component
{
    public $mahasiswa;
    public $contentheader;

    protected $listeners = ['hapus' => 'hapusData'];

    public function render()
    {
        $this->contentheader = "Data Mahasiswa";
        $this->mahasiswa = Data::latest()->get();
        return view('livewire.dashboard-data-mahasiswa')
        ->extends('layouts.admin-layout')
        ->section('main-content');
    }

    public function hapusData($mahasiswa_id)
    {
        $id = $mahasiswa_id;
        $findUser = Data::findOrFail($id);
        $findUser->forceDelete();
        return redirect()->route('data-mahasiswa')->with('status', 'Data telah dihapus!');
    }
}
