@extends('layouts.app')
@section('content')
	<form action="{{route('admin.languages.store')}}" method="post">
		@include('admin.language.form')
	</form>
	</div>
@endsection