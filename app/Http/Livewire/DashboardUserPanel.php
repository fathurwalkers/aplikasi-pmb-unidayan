<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;
use Livewire\Component;

class DashboardUserPanel extends Component
{
    public function render()
    {
        return view('livewire.dashboard-user-panel');
    }

    public function logout(Request $request)
    {
        // $request->session()->forget(['data_login']);
        $request->session()->flush();
        return redirect()->route('dashboard')->with('status', 'Anda berhasil Logout!');
    }
}
