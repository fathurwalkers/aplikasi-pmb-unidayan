<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DashboardProfile extends Component
{
    public $contentheader;
    public function render()
    {
        $this->contentheader = "Profile";
        return view('livewire.dashboard-profile')
        ->extends('layouts.admin-layout')
        ->section('main-content');
    }
}
