@extends('layouts.app')
@section('content')
<div class="container">
	<search searchRoute="admin.clients.index" :value="$search"></search>
	<a href="{{ route('admin.clients.create') }}" class="btn btn-primary" style="float: right; margin-bottom: 20px;">Add Client</a>
	
	<table-x :fields="$fields" :items="$clients" editRoute="admin.clients.edit" deleteRoute="admin.clients.destroy"></table-x>

	<pagination :links="$clients->links()"></pagination>
</div>
@endsection
