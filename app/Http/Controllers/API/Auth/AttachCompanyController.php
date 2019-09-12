<?php

namespace App\Http\Controllers\API\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AttachCompanyRequest;

class AttachCompanyController extends Controller
{
    /**
     * Attach an existing company ID to a user.
     *
     * @param AttachCompanyRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(AttachCompanyRequest $request)
    {
        /*
         * Find the user based on uuid
         * and link the company to the user
         */
        User::findByUuidOrFail($request->uuid)
            ->update([
                'company_id' => $request->company_id,
            ]);

        return response()->json(null, 204);
    }
}
