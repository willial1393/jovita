<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('admin_users_id'), 'has-success': this.fields.admin_users_id && this.fields.admin_users_id.valid }">
    <label for="admin_users_id" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.facturaventum.columns.admin_users_id') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <multiselect v-model="form.admin_users_id"
                     placeholder="{{ trans('admin.facturaventum.columns.admin_users_id') }}"
                     :allow-empty="false"
                     :options="{{ $usuarios->toJson()}}.map(type => type.id)"
                     :custom-label="opt => {{$usuarios->toJson()}}.find(x => x.id == opt).first_name +' '+ {{$usuarios->toJson()}}.find(x => x.id == opt).first_name "
                     :close-on-select="true"
                     :disabled="true"
                     open-direction="bottom"></multiselect>
        <div v-if="errors.has('admin_users_id')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('admin_users_id') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('cliente_id'), 'has-success': this.fields.cliente_id && this.fields.cliente_id.valid }">
    <label for="cliente_id" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.facturaventum.columns.cliente_id') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <multiselect v-model="form.cliente_id" placeholder="{{ trans('admin.facturaventum.columns.cliente_id') }}"
                     :allow-empty="false"
                     :options="{{ $clientes->toJson()}}.map(type => type.id)"
                     :custom-label="opt => {{$clientes->toJson()}}.find(x => x.id == opt).nombre"
                     :close-on-select="true"
                     open-direction="bottom"></multiselect>
        <div v-if="errors.has('cliente_id')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('cliente_id') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('estado'), 'has-success': this.fields.estado && this.fields.estado.valid }">
    <label for="estado" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.facturaventum.columns.estado') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <multiselect v-model="form.estado" placeholder="{{ trans('admin.facturaventum.columns.estado') }}"
                     :allow-empty="false"
                     :options="{{ $estados->toJson()}}.map(type => type.name)"
                     :custom-label="opt => {{$estados->toJson()}}.find(x => x.name == opt).name"
                     :close-on-select="true"
                     open-direction="bottom"></multiselect>
        <div v-if="errors.has('estado')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('estado') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('fecha'), 'has-success': this.fields.fecha && this.fields.fecha.valid }">
    <label for="fecha" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.facturaventum.columns.fecha') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.fecha" :config="datePickerConfig"
                      v-validate="'required|date_format:yyyy-MM-dd HH:mm:ss|after:afterTarget'"
                      class="flatpickr"
                      :class="{'form-control-danger': errors.has('fecha'), 'form-control-success': this.fields.fecha && this.fields.fecha.valid}"
                      id="fecha" name="fecha"
                      placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>
        </div>
        <div v-if="errors.has('fecha')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('fecha') }}
        </div>
    </div>
</div>

<input hidden name="after_field_target" ref="afterTarget" type="text"
       value="{{$facturaventum->fecha?\Carbon\Carbon::parse($facturaventum->fecha)->subDay(1) :\Carbon\Carbon::now()->subDay(1)}}">


<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('numero'), 'has-success': this.fields.numero && this.fields.numero.valid }">
    <label for="numero" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.facturaventum.columns.numero') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.numero" v-validate="'required|numeric'" @input="validate($event)"
               class="form-control"
               :class="{'form-control-danger': errors.has('numero'), 'form-control-success': this.fields.numero && this.fields.numero.valid}"
               id="numero" name="numero" placeholder="{{ trans('admin.facturaventum.columns.numero') }}">
        <div v-if="errors.has('numero')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('numero')
            }}
        </div>
    </div>
</div>


