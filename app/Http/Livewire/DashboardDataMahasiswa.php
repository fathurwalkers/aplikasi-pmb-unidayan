<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Data;
use Illuminate\Support\Str;

class DashboardDataMahasiswa extends Component
{
    public $mahasiswa;
    public $contentheader;
    public function render()
    {
        $this->contentheader = "Data Mahasiswa";
        $this->mahasiswa = Data::latest()->get();
        return view('livewire.dashboard-data-mahasiswa')
        ->extends('layouts.admin-layout')
        ->section('main-content');
    }
}
