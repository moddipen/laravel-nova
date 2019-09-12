@extends('layouts.app')
@section('content')
	<form action="{{route('admin.countries.store')}}" method="post">
		@include('admin.country.form')
	</form>
	</div>
@endsection
