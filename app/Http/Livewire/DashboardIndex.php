<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DashboardIndex extends Component
{
    public $contentheader;
    public function render()
    {
        $this->contentheader = "Livewire";
        return view('livewire.dashboard-index')
        ->extends('layouts.admin-layout')
        ->section('main-content');
    }
}
