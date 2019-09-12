@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{auth()->user()->roles->first()->name}} Dashboard   : {{auth()->user()->first_name}} {{auth()->user()->last_name}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @hasrole(config('fanbox.roles.super_admin'))
                        <ul>
                            <li><a href="{{ route('admin.genders.index') }}">Gender</a> </li>
                        </ul>

                        <ul>
                            <li><a href="{{ url('admin/admins') }}">Admin</a> </li>
                        </ul>

                        <ul>
                            <li><a href="{{ route('admin.countries.index') }}">Country</a> </li>
                        </ul>

                        <ul>
                            <li><a href="{{ route('admin.clients.index') }}">Client</a> </li>
                        </ul>

                        <ul>
                            <li><a href="{{ route('admin.languages.index') }}">Language</a> </li>
                        </ul>
                    @endhasrole

                    @if(session('impersonated_by') )
                        <li><a href="{{ route('admin.impersonateLeave') }}">Back to my account</a></li>
                    @endif
                </div>
            </div>
        </div>
    </div>


    @hasrole(config('fanbox.roles.super_admin'))
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"> Admin User List</div>

                    <div class="card-body">
                        @if(isset($adminUsers) && ! empty($adminUsers))
                            <table class="table">
                                <tr>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>

                                @foreach($adminUsers as $user)
                                    <tr>
                                        <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                                        <td><a href="{{ route('admin.impersonate', ['id'=>$user->id]) }}" class="btn btn-warning">Impersonate</a></td>
                                    </tr>
                                @endforeach

                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endhasrole
</div>
@endsection
