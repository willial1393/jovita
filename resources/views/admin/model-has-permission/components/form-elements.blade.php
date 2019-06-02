<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('permission_id'), 'has-success': this.fields.permission_id && this.fields.permission_id.valid }">
    <label for="permission_id" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.model-has-permission.columns.permission_id') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <multiselect v-model="form.permission_id"
                     placeholder="{{ trans('admin.model-has-permission.columns.permission_id') }}"
                     :options="{{ $permisos->toJson()}}.map(type => type.id)"
                     :custom-label="opt => {{$permisos->toJson()}}.find(x => x.id == opt).name"
                     :close-on-select="true"
                     open-direction="bottom"></multiselect>
        <div v-if="errors.has('permission_id')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('permission_id') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('model_type'), 'has-success': this.fields.model_type && this.fields.model_type.valid }">
    <label for="model_type" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.model-has-permission.columns.model_type') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.model_type" v-validate="'required'" @input="validate($event)"
               class="form-control"
               :class="{'form-control-danger': errors.has('model_type'), 'form-control-success': this.fields.model_type && this.fields.model_type.valid}"
               id="model_type" name="model_type"
               placeholder="{{ trans('admin.model-has-permission.columns.model_type') }}">
        <div v-if="errors.has('model_type')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('model_type') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('model_id'), 'has-success': this.fields.model_id && this.fields.model_id.valid }">
    <label for="model_id" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.model-has-permission.columns.model_id') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <multiselect v-model="form.model_id" placeholder="{{ trans('admin.model-has-permission.columns.model_id') }}"
                     :options="{{ $roles->toJson()}}.map(type => type.id)"
                     :custom-label="opt => {{$roles->toJson()}}.find(x => x.id == opt).name"
                     :close-on-select="true"
                     open-direction="bottom"></multiselect>
        <div v-if="errors.has('model_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('model_id')
            }}
        </div>
    </div>
</div>
