<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Informasi;

class DashboardDataInformasi extends Component
{
    public $informasi;
    public $contentheader;

    protected $listeners = ['hapus' => 'hapusData'];

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
