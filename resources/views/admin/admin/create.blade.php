@extends('layouts.app')
@section('content')
	<form action="{{route('admin.admins.store')}}" method="post">
		@include('admin.admin.form')
	</form>
	</div>
@endsection
