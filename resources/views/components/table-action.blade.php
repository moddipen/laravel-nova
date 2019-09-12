<form action="{{ route($deleteRoute, $item->id) }}" onsubmit="return confirm('Are you sure you want to delete?')" method="post">
	<a href="{{ route($editRoute,$item->id) }}" class="btn btn-primary">Edit</a>
    <input class="btn btn-danger" type="submit" value="Delete" />
    @method('delete')
    @csrf
</form>

