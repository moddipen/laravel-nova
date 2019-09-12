@extends('layouts.app')
@section('content')
	<form action="{{ route('admin.languages.update',$language->id) }}" method="post">
		@method('PUT')
		@include('admin.language.form')
	</form>
	</div>
@endsection