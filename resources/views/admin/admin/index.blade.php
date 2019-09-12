@extends('layouts.app')
@section('content')
<div class="container">
	<search searchRoute="admin.admins.index" :value="$search"></search>
	<a href="{{ route('admin.admins.create') }}" class="btn btn-primary" style="float: right; margin-bottom: 20px;">Add Admin</a>
	<table-x :fields="$fields" :items="$users"  editRoute="admin.admins.edit" deleteRoute="admin.admins.destroy"></table-x>
	<pagination :links="$users->links()"></pagination>
</div>
@endsection