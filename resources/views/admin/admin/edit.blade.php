@extends('layouts.app')
@section('content')
	<div class="container">
		<a href="{{ route('admin.impersonate', ['id'=>$admin->id]) }}" class="btn btn-primary">Impersonate</a>
	</div>
	<form action="{{ route('admin.admins.update', $admin->id) }}" method="post">
		{{ method_field('PATCH') }}
		@include('admin.admin.form')
	</form>
	</div>
@endsection
