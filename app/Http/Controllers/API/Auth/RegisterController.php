<?php

namespace App\Http\Controllers\API\Auth;

use App\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\User\UserResource;
use App\Http\Requests\Auth\RegisterRequest;

class RegisterController extends Controller
{
    /**
     * Create a new user account.
     *
     * @param RegisterRequest $request
     * @return UserResource
     */
    public function __invoke(RegisterRequest $request)
    {
        /**
         * Create the user with the minimum credentials.
         */
        $user = User::create([
            'uuid' => Str::orderedUuid(),
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'first_name' => $request['first_name'],
            'middle_name' => $request['middle_name'] ?? '',
            'last_name' => $request['last_name'],
            'phone' => $request['phone'],
            'country_id' => $request['country_id'],
            'gender_id' => $request['gender_id'],
            'date_of_birth' => $request['date_of_birth'],
            'image_src' => 'https://lorempixel.com/100/100/',
        ]);

        return new UserResource($user);
    }
}
