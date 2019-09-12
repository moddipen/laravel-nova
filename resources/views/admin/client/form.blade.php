@csrf
<div class="container">
  <div class="form-group">
    <input-field :label="trans('label.name')" type="text" name="name" :value="!empty($client) ? $client->name : old('name')" :placeholder="trans('label.client_placeholder.enter_name')"></input-field>
    @error('name')
		<form-error :message="$message"></form-error >
	@enderror
  </div>
	<button type="submit" class="btn btn-primary">{{ !empty($client) ? 'Update' : 'Create'}}</button>
	<a href="{{ route('admin.clients.index') }}" class="btn btn-primary">Cancel</a>
</div>