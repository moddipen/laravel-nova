<?php

namespace App\Http\Controllers\Admin;

use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Country\CountryRequest;

class CountryController extends Controller
{
    private $statusOptions;
    private $fields;

    public function __construct()
    {
        $this->statusOptions = config('constants.country.status_options');
        $this->fields = config('constants.country.fields');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        /*Function to get the listing of the countries*/
        $search = $request->get('search');
        if ($search) {
            $countries = Country::where('name', 'like', '%'.$request->search.'%')->orWhere('iso', 'like', '%'.$request->search.'%')->paginate(10);
        } else {
            $countries = Country::paginate(10);
        }
        $fields = $this->fields;

        return view('admin.country.index', compact('countries', 'fields', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $options = $this->statusOptions;

        return view('admin.country.create', compact('options'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CountryRequest $request)
    {
        $country = new Country();
        $country = $country->create($request->all());

        return redirect()->route('admin.countries.edit', $country->id)->with('success', trans('country/messages.country_add'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        $options = $this->statusOptions;

        return view('admin.country.edit', compact('country', 'options'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CountryRequest $request, Country $country)
    {
        $country->update($request->all());

        return redirect()->route('admin.countries.index')->with('success', trans('country/messages.country_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        $country->delete();

        return redirect()->route('admin.countries.index')->with('success', trans('country/messages.country_delete'));
    }
}
