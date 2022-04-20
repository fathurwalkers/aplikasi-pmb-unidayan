<?php

namespace App\Http\Livewire;

use App\Models\Data;
use Livewire\Component;
use App\Models\Login;

class DashboardIndex extends Component
{
    public $contentheader;
    public $name;
    public $users;

    protected $rules = [
        'name' => [''],
    ];

    public function render()
    {
        $session_user = session('data_login');
        $getUsers = Login::findOrFail($session_user->id);
        $this->users = $getUsers;
        // $this->name = Data::find(intval($name));
        $this->contentheader = "Livewire";
        return view('livewire.dashboard-index')
        ->extends('layouts.admin-layout')
        ->section('main-content');
    }
}
