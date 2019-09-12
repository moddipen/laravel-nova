<?php
/**
 * Created by PhpStorm.
 * User: tejm
 * Date: 2019-05-22
 * Time: 12:20.
 */

namespace App\Http\Controllers\API;

use App\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\User\UserResource;

class AuthController extends Controller
{
    /**
     * Return the user to itself.
     *
     * @return UserResource
     */
    public function details()
    {
        $user = Auth::user();

        return new UserResource($user);
    }
}
