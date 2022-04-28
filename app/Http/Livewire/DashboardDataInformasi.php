<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Informasi;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Illuminate\Support\Arr;
use App\Models\Login;
use App\Models\Data;
use App\Models\Histori;

class DashboardDataInformasi extends Component
{
    public $informasi;
    public $contentheader;

    protected $listeners = [
        'hapus' => 'hapusData',
    ];

    public function render()
    {
        $this->informasi = Informasi::latest()->get();
        $this->contentheader = "Data Informasi";
        return view('livewire.dashboard-data-informasi')
        ->extends('layouts.admin-layout')
        ->section('main-content');
    }

    public function hapusData($id_informasi)
    {
        $id = $id_informasi;
        $find_informasi = Informasi::findOrFail($id);
        $find_informasi->forceDelete();
        return redirect()->route('data-informasi')->with('status', 'Data telah dihapus!');
    }
}
