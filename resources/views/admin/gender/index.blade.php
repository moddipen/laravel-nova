@extends('layouts.app')
@section('content')
<div class="container">
	<a href="{{ route('admin.genders.create') }}" class="btn btn-primary" style="float: right; margin-bottom: 20px;">Add Gender</a>

	<search searchRoute="admin.genders.index" :value="$search"></search>
	<div class="row justify-content-center mt-5">
		<div class="col-md-10">
			<div class="card">
				<div class="card-header">List Of Genders</div>

				<div class="card-body">


					<table-x :fields="$fields" :items="$genders" editRoute="admin.genders.edit" deleteRoute="admin.genders.destroy"></table-x>
				</div>
			</div>
		</div>
	</div>

	<pagination :links="$genders->links()"></pagination>
</div>
@endsection