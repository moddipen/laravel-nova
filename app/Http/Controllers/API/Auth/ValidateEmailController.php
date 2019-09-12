<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ValidateEmailRequest;

class ValidateEmailController extends Controller
{
    /**
     * Validate whether a user already exists with this e-mail address.
     *
     * @param ValidateEmailRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(ValidateEmailRequest $request)
    {
        return response()->json(null, 204);
    }
}
