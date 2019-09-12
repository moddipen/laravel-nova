<div class="container">
    <div class="form-group">
        <input-field :label="trans('label.name')" type="text" name="name" :value="!empty($gender) ? $gender->name : old('name')" :placeholder="trans('label.gender_placehoder.enter_name')"></input-field>
        @error('name')
        <form-error :message="$message"></form-error >
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">{{ !empty($gender) ? 'Update' : 'Create'}}</button>
    <a href="{{ route('admin.genders.index') }}" class="btn btn-danger">Cancel</a>
</div>
