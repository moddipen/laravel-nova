@csrf
<div class="container">
  <div class="form-group">
    <input-field :label="trans('label.name')" type="text" name="name" :value="!empty($language) ? $language->name : old('name')" :placeholder="trans('label.language_placeholder.enter_name')"></input-field>
    @error('name')
    <form-error :message="$message"></form-error >
  @enderror
  </div>
  <div class="form-group">
    <input-field :label="trans('label.language_code')" type="text" name="code" :value="!empty($language) ? $language->code : old('code')" :placeholder="trans('label.language_placeholder.language_code')"></input-field>
    @error('code')
        <form-error  :message="$message"></form-error >
    @enderror
  </div>
  <div class="form-group">
    <select-fields :label="trans('label.status')" name="is_active" :options="$options" :selected="!empty($language) ? ($language->is_active ? 1 : 0 ) : 1 "></select-fields>
  </div>
  <button type="submit" class="btn btn-primary">{{ !empty($language) ? 'Update' : 'Create'}}</button>
  <a href="{{ route('admin.languages.index') }}" class="btn btn-primary">Cancel</a>
</div>