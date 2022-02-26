<?php

namespace App\Http\Livewire;

use App\Models\Data;
use Livewire\Component;

class DashboardIndex extends Component
{
    public $contentheader;
    public $name;

    protected $rules = [
        'name' => [''],
    ];

    public function render()
    {
        // $this->name = Data::find(intval($name));
        $this->contentheader = "Livewire";
        return view('livewire.dashboard-index')
        ->extends('layouts.admin-layout')
        ->section('main-content');
    }
}
