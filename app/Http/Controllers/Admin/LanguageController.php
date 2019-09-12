<?php

namespace App\Http\Controllers\Admin;

use App\Models\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Language\LanguageRequest;

class LanguageController extends Controller
{
    private $statusOptions;
    private $fields;

    public function __construct()
    {
        $this->statusOptions = config('constants.language.status_options');

        $this->fields = config('constants.language.fields');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        if ($search) {
            $search = $request->search;
            $languages = Language::where('name', 'like', '%'.$request->search.'%')->orWhere('code', 'like', '%'.$request->search.'%')->paginate(10);
        } else {
            $languages = Language::paginate(10);
        }
        $fields = $this->fields;

        return view('admin.language.index', compact('languages', 'fields', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $options = $this->statusOptions;

        return view('admin.language.create', compact('options'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LanguageRequest $request)
    {
        $language = new Language();
        $language = $language->create($request->all());

        return redirect()->route('admin.languages.edit', $language->id)->with('success', trans('language/messages.language_add'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Language $language)
    {
        $options = $this->statusOptions;

        return view('admin.language.edit', compact('language', 'options'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LanguageRequest $request, Language $language)
    {
        $language->update($request->all());

        return redirect()->route('admin.languages.index')->with('success', trans('language/messages.language_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Language $language)
    {
        $language->delete();

        return redirect()->route('admin.languages.index')->with('success', trans('language/messages.language_delete'));
    }
}
