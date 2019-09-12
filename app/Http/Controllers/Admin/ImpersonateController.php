<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ImpersonateController extends Controller
{
    /**
     * Impersonate admin by super admin.
     *
     * @return \Illuminate\Http\Response
     */
    public function impersonate($id)
    {
        $user = User::find($id);
        Auth::user()->impersonate($user);

        return redirect()->route('admin.dashboard');
    }

    /**
     * Leave Impersonate.
     *
     * @return \Illuminate\Http\Response
     */
    public function impersonateleave()
    {
        Auth::user()->leaveImpersonation();

        return redirect()->route('admin.dashboard');
    }
}
