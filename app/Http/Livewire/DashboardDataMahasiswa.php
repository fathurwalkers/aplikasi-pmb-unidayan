<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Data;

class DashboardDataMahasiswa extends Component
{
    protected $mahasiswa;

    public function render()
    {
        $this->mahasiswa = Data::latest()->get();
        return view('livewire.dashboard-data-mahasiswa', [
            'mahasiswa' => $this->mahasiswa
        ]);
    }
}
