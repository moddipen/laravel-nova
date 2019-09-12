@csrf
<div class="container">
  <div class="form-group">
    <input-field :label="trans('label.email')" type="email" name="email" :value="!empty($admin) ? $admin->email : old('email')" :placeholder="trans('label.admin_placehoder.enter_email')"></input-field>
    @error('email')
      <form-error :message="$message"></form-error >
    @enderror
  </div>

  @if (!isset($admin))
  <div class="form-group">
    <input-field :label="trans('label.password')" type="password" name="password" :value="!empty($admin) ? $admin->password : old('password')" :placeholder="trans('label.admin_placehoder.enter_password')"></input-field>
    @error('password')
      <form-error :message="$message"></form-error >
    @enderror
  </div>
  @endif

  <div class="form-group">
    <input-field :label="trans('label.first_name')" type="text" name="first_name" :value="!empty($admin) ? $admin->first_name : old('first_name')" :placeholder="trans('label.admin_placehoder.enter_first_name')"></input-field>
    @error('first_name')
    <form-error :message="$message"></form-error >
    @enderror
  </div>

  <div class="form-group">
    <input-field :label="trans('label.last_name')" type="text" name="last_name" :value="!empty($admin) ? $admin->last_name : old('last_name')" :placeholder="trans('label.admin_placehoder.enter_last_name')"></input-field>
    @error('last_name')
      <form-error :message="$message"></form-error >
    @enderror
  </div>

  <div class="form-group">
    <input-field :label="trans('label.date_of_birth')" type="date" name="date_of_birth" :value="!empty($admin) ? $admin->date_of_birth : old('date_of_birth')" :placeholder="trans('label.admin_placehoder.enter_date_of_birth')"></input-field>
    @error('date_of_birth')
      <form-error :message="$message"></form-error >
    @enderror
  </div>
  
  <div class="form-group">
    <select-fields :label="trans('label.company')" name="company_id" :options="$clients"></select-fields>
  </div>

  <div class="form-group">
      <select-fields :label="trans('label.country')" name="country_id" :options="$countries"></select-fields>
  </div>

  <div class="form-group">
    <select-fields :label="trans('label.gender')" name="gender_id" :options="$genders"></select-fields>
  </div>

  <button type="submit" class="btn btn-primary">{{ !empty($admin) ? 'Update' : 'Save'}}</button>
  
  <a href="{{ route('admin.admins.index') }}" class="btn btn-primary">Cancel</a>

  </div>
