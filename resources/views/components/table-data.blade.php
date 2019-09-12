<tr>
	@foreach($fields as $key => $value)
		@if($key == 'action')
			<td>
				<table-action :editRoute="$editRoute" :item="$item" :deleteRoute="$deleteRoute"></table-action>	
			</td>
		@else
			<td> {!! $data($item,$key) !!} </td>
		@endif
	@endforeach
</tr>

