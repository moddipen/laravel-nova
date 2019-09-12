@extends('layouts.app')
@section('content')
<div class="container">
	<search searchRoute="admin.countries.index" :value="$search"></search>
	<a href="{{ route('admin.countries.create') }}" class="btn btn-primary" style="float: right; margin-bottom: 20px;">Add Country</a>

	<table-x :fields="$fields" :items="$countries" editRoute="admin.countries.edit" deleteRoute="admin.countries.destroy"></table-x>

	<pagination :links="$countries->links()"></pagination>
</div>
@endsection