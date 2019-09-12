<form method="get" action="{{ route($searchRoute) }}">
	<div class="row">
		<div class="col-md-3">
			<input type="text" class="form-control" name="search" value="{{$value}}">
		</div>
		<button class="btn btn-primary">Search</button>
	</div>
</form>
