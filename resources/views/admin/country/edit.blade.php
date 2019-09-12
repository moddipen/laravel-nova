@extends('layouts.app')
@section('content')
	<form action="{{ route('admin.countries.update',$country->id) }}" method="post">
		@method('PUT')
		@include('admin.country.form')
	</form>
	</div>
@endsection