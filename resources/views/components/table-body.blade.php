<tbody>
	@foreach($items as $item)
		<table-data :item="$item" :fields="$fields" :editRoute="$editRoute" :deleteRoute="$deleteRoute"></table-data>
	@endforeach
</tbody>
