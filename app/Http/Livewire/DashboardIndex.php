<?php

namespace App\Http\Livewire;

use App\Models\Data;
use Livewire\Component;
use App\Models\Login;
use App\Models\Histori;

class DashboardIndex extends Component
{
    public $contentheader;
    public $name;
    public $users;
    public $histori;

    protected $rules = [
        'name' => [''],
    ];

    protected $listeners = [
        'hapusLogAktifitas' => 'hapus_aktifitas'
    ];

    public function render()
    {
        $session_user = session('data_login');
        $getUsers = Login::findOrFail($session_user->id);
        $this->users = $getUsers;

        switch ($getUsers->login_level) {
            case 'admin':
                $this->histori = Histori::latest()->get();
                break;
            case 'pendaftar':
                $this->histori = Histori::where('login_id', $getUsers->id)->get();
                break;
        }

        // $this->name = Data::find(intval($name));
        $this->contentheader = "Dashboard";
        return view('livewire.dashboard-index')
        ->extends('layouts.admin-layout')
        ->section('main-content');
    }

    public function hapus_aktifitas($id)
    {
        $log_aktifitas_id = $id;
        $findUser = Histori::findOrFail($log_aktifitas_id);
        $findUser->forceDelete();
        return redirect()->route('dashboard')->with('status', 'Data Aktifitas telah dihapus.');
    }
}
