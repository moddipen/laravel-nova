<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Display a dashboard resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adminUsers = User::whereHas('roles', function ($q) {
            $q->where('name', config('fanbox.roles.admin'));
        })->get();

        return view('admin.dashboard', compact('adminUsers'));
    }
}
