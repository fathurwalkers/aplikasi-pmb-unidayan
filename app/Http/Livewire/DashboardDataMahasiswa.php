<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Data;

class DashboardDataMahasiswa extends Component
{
    public $mahasiswa;

    public function render()
    {
        $this->mahasiswa = Data::latest()->get();
        // $mahasiswa = $mahasiswa
        return view('livewire.dashboard-data-mahasiswa');
        // return view('livewire.dashboard-data-mahasiswa', [
        //     'mahasiswa' => $mahasiswa,
        //     'title' => "fffdd"
        // ]);
    }
}
