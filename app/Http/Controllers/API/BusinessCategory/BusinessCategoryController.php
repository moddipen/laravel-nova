<?php

namespace App\Http\Controllers\API\BusinessCategory;

use Illuminate\Http\Request;
use App\Models\BusinessCategory;
use App\Http\Controllers\Controller;
use App\Http\Resources\BusinessCategory\BusinessCategoryResource;
use App\Http\Resources\BusinessCategory\BusinessCategoryCollectionResource;

class BusinessCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return BusinessCategoryCollectionResource
     */
    public function index()
    {
        $businessCategories = BusinessCategory::all();

        return new BusinessCategoryCollectionResource($businessCategories);
    }

    /**
     * Display the specified resource.
     *
     * @param $businessCategory
     * @return BusinessCategoryResource
     */
    public function show(BusinessCategory $businessCategory)
    {
        return new BusinessCategoryResource($businessCategory);
    }
}
