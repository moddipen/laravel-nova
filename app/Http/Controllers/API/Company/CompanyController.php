<?php

namespace App\Http\Controllers\API\Company;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Company\CompanyResource;
use App\Http\Resources\Company\CompanyCollectionResource;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return CompanyCollectionResource
     */
    public function index()
    {
        $companies = Company::with('country')->withCount('users')
            ->get();

        return new CompanyCollectionResource($companies);
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return CompanyResource
     */
    public function show($id)
    {
        $company = Company::with('country')->withCount('users')
            ->with('users')
            ->findOrFail($id);

        return new CompanyResource($company);
    }
}
