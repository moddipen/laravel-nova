@extends('layouts.app')
@section('content')
	<form action="{{route('admin.clients.store')}}" method="post">
		@include('admin.client.form')
	</form>
	</div>
@endsection