<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Informasi;

class DashboardDataInformasi extends Component
{
    public $informasi;
    public $contentheader;

    public $informasi_title;
    public $informasi_body;

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

    public function tambah_informasi()
    {
        $informasi = new Informasi;
        // $save_informasi = $informasi->create([
        //     "informasi_kode" => ,
        //     "informasi_title" => ,
        //     "informasi_body" => ,
        //     "informasi_waktu" => ,
        //     "created_at" => now(),
        //     "updated_at" => now()
        // ]);
        $save_informasi->save();
        $this->resetInput();
    }

    private function resetInput()
    {
       $this->informasi_kode = null;
       $this->informasi_title = null;
       $this->informasi_body = null;
       $this->informasi_waktu = null;
    }
}
