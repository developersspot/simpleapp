<?php

namespace App\Http\Controllers;

use App\User;

class DashboardController extends Controller
{
    public function index()
    {
        $total_users = 0;
        if (auth()->user()->role == 1) {
            $total_users = User::where('role', 2)->count();
        }
        return view('dashboard')->with('total_users', $total_users);
    }
}
