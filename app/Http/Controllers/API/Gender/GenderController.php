<?php

namespace App\Http\Controllers\API\Gender;

use App\Models\Gender;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Gender\GenderResource;
use App\Http\Resources\Gender\GenderCollectionResource;

class GenderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return GenderCollectionResource
     */
    public function index()
    {
        $events = Gender::all();

        return new GenderCollectionResource($events);
    }

    /**
     * Display the specified resource.
     *
     * @param Gender $gender
     * @return GenderResource
     */
    public function show(Gender $gender)
    {
        return new GenderResource($gender);
    }
}
