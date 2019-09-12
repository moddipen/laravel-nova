@extends('layouts.app')
@section('content')
	<div class="container">
		{{--	<a href="{{ route('genders.create') }}" class="btn btn-primary" style="float: right; margin-bottom: 20px;">Add Gender</a>--}}
		<div class="row justify-content-center mb-5">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">Update Gender</div>

					<div class="card-body">
						<form action="{{ route('admin.genders.update',$gender->id) }}" method="post">
							@csrf
							@method('PUT')
							@include('admin.gender.form')
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection