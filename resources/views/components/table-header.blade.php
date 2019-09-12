<thead class="thead-light">
	<tr>
		@foreach($fields as $key => $value)
			<th>{{ trans($value) }}</th>
		@endforeach
	</tr>
</thead>

