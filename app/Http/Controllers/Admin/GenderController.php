<?php

namespace App\Http\Controllers\Admin;

use App\Models\Gender;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GenderRequest;

class GenderController extends Controller
{
    private $fields = [
        'name' => 'Name',
        'action' => 'Action',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $fields = $this->fields;
        $search = $request->get('search');

        if ($search) {
            $genders = Gender::where('name', 'like', '%'.$request->search.'%')->paginate(10);
        } else {
            $genders = Gender::paginate(10);
        }

        return view('admin.gender.index', compact('genders', 'fields', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gender.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GenderRequest $request)
    {
        $gender = new Gender();
        $gender = $gender->create($request->all());

        return redirect()->route('admin.genders.edit', $gender->id)->with('success', trans('gender/messages.gender_add'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Gender $gender)
    {
        $fields = $this->fields;
        $gender = Gender::find($gender->id);

        return view('admin.gender.edit', compact('gender', 'fields'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GenderRequest $request, Gender $gender)
    {
        $gender->update($request->all());

        return redirect()->route('admin.genders.index')->with('success', trans('gender/messages.gender_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gender $gender)
    {
        $gender->delete();

        return redirect()->route('admin.genders.index')->with('success', trans('gender/messages.gender_delete'));
    }
}
