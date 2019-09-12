<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Return view for normal user.
     */
    public function index()
    {
        return view('home');
    }
}
