@extends('layouts.app')
@section('content')
	<form action="{{ route('admin.clients.update',$client->id) }}" method="post">
		@method('PUT')
		@include('admin.client.form')
	</form>
	</div>
@endsection