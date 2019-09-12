<?php

namespace App\Http\Controllers\Admin;

use Hash;
use App\Models\User;
use App\Models\Gender;
use App\Models\Company;
use App\Models\Country;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;

class AdminController extends Controller
{
    private $fields;

    public function __construct()
    {
        $this->fields = config('constants.admin.fields');
        $this->statusOptions = config('fanbox.roles');
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
            $users = User::whereHas('roles', function ($q) use ($search) {
                $q->where('name', config('fanbox.roles.admin'));
                $q->where('first_name', 'like', '%'.$search.'%');
            })->paginate(10);
        } else {
            $users = User::with('gender', 'country', 'company')
            ->whereHas('roles', function ($q) {
                $q->where('name', config('fanbox.roles.admin'));
            })->paginate(10);
        }
        $fields = $this->fields;

        return view('admin.admin.index', compact('users', 'fields', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Company::pluck('name', 'id')->toArray();
        $countries = Country::pluck('name', 'id')->toArray();
        $genders = Gender::pluck('name', 'id')->toArray();

        return view('admin.admin.create', compact('clients', 'countries', 'genders'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $uuid = Str::uuid()->toString();
        $request['uuid'] = $uuid;
        $request['password'] = Hash::make($request->password);
        $user = new User();
        $user = $user->create($request->all());
        $user->assignRole(config('fanbox.roles.admin'));

        return redirect()->route('admin.admins.edit', $user->id)->with('success', trans('admin/messages.admin_add'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $admin)
    {
        $clients = Company::pluck('name', 'id')->toArray();
        $countries = Country::pluck('name', 'id')->toArray();
        $genders = Gender::pluck('name', 'id')->toArray();

        return view('admin.admin.edit', compact('admin', 'clients', 'countries', 'genders'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $admin)
    {
        $admin->update($request->all());

        return redirect()->route('admin.admins.index')->with('success', trans('admin/messages.admin_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $admin)
    {
        $admin->delete();

        return redirect()->route('admin.admins.index')->with('success', trans('admin/messages.admin_delete'));
    }
}
