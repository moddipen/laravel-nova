@csrf
<div class="container">
  <div class="form-group">
    <input-field :label="trans('label.name')" type="text" name="name" :value="!empty($country) ? $country->name : old('name')" :placeholder="trans('label.country_placeholder.enter_name')"></input-field>
    @error('name')
    <form-error :message="$message"></form-error >
  @enderror
  </div>
  <div class="form-group">
    <input-field :label="trans('label.iso')" type="text" name="iso" :value="!empty($country) ? $country->iso : old('iso')" :placeholder="trans('label.country_placeholder.enter_iso_code')"></input-field>
    @error('iso')
        <form-error  :message="$message"></form-error >
    @enderror
  </div>
  <div class="form-group">
    <input-field :label="trans('label.code')" type="text" name="code" :value="!empty($country) ? $country->code : old('code')" :placeholder="trans('label.country_placeholder.enter_country_code')"></input-field>
    @error('code')
        <form-error  :message="$message"></form-error >
    @enderror
  </div>
  <div class="form-group">
    <select-fields :label="trans('label.status')" name="is_active" :options="$options" :selected="!empty($country) ? ($country->is_active ? 1 : 0 ) : 1 "></select-fields>
  </div>
  <button type="submit" class="btn btn-primary">{{ !empty($country) ? 'Update' : 'Create'}}</button>
  <a href="{{ route('admin.countries.index') }}" class="btn btn-primary">Cancel</a>
</div>