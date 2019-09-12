@extends('layouts.app')
@section('content')
<div class="container">
	<search searchRoute="admin.languages.index" :value="$search"></search>
	<a href="{{ route('admin.languages.create') }}" class="btn btn-primary" style="float: right; margin-bottom: 20px;">Add Language</a>
	
	<table-x :fields="$fields" :items="$languages" editRoute="admin.languages.edit" deleteRoute="admin.languages.destroy"></table-x>

	<pagination :links="$languages->links()"></pagination>
</div>
@endsection
