<?php

namespace App\Http\Controllers\API\Country;

use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Country\CountryResource;
use App\Http\Resources\Country\CountryCollectionResource;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return CountryCollectionResource
     */
    public function index()
    {
        $countries = Country::all();

        return new CountryCollectionResource($countries);
    }

    /**
     * Display the specified resource.
     *
     * @param Country $country
     * @return CountryResource
     */
    public function show(Country $country)
    {
        return new CountryResource($country);
    }
}
