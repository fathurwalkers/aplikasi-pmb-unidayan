<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Login;

class DashboardNavbar extends Component
{
    public $usersss;

    public function render()
    {
        $finduser = session('data_login');
        $users = Login::findOrFail($finduser->id);
        $this->usersss = $users;
        return view('livewire.dashboard-navbar');
    }
}
