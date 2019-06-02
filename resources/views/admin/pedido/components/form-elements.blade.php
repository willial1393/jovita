<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('admin_users_id'), 'has-success': this.fields.admin_users_id && this.fields.admin_users_id.valid }">
    <label for="admin_users_id" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.pedido.columns.admin_users_id') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <multiselect v-model="form.admin_users_id" placeholder="{{ trans('admin.pedido.columns.admin_users_id') }}"
                     :options="{{ $usuarios->toJson()}}.map(type => type.id)"
                     :custom-label="opt => {{$usuarios->toJson()}}.find(x => x.id == opt).first_name + ' ' + {{$usuarios->toJson()}}.find(x => x.id == opt).last_name"
                     :close-on-select="true"
                     :disabled="true"
                     open-direction="bottom"></multiselect>
        <div v-if="errors.has('admin_users_id')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('admin_users_id') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('estado'), 'has-success': this.fields.estado && this.fields.estado.valid }">
    <label for="estado" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.pedido.columns.estado') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.estado" v-validate="''" @input="validate($event)" class="form-control"
               :class="{'form-control-danger': errors.has('estado'), 'form-control-success': this.fields.estado && this.fields.estado.valid}"
               id="estado" name="estado" placeholder="{{ trans('admin.pedido.columns.estado') }}">
        <div v-if="errors.has('estado')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('estado') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('fecha'), 'has-success': this.fields.fecha && this.fields.fecha.valid }">
    <label for="fecha" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.pedido.columns.fecha') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.fecha" :config="datePickerConfig" v-validate="'date_format:yyyy-MM-dd HH:mm:ss'"
                      class="flatpickr"
                      :class="{'form-control-danger': errors.has('fecha'), 'form-control-success': this.fields.fecha && this.fields.fecha.valid}"
                      id="fecha" name="fecha"
                      placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>
        </div>
        <div v-if="errors.has('fecha')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('fecha') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('numeroPedido'), 'has-success': this.fields.numeroPedido && this.fields.numeroPedido.valid }">
    <label for="numeroPedido" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.pedido.columns.numeroPedido') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.numeroPedido" v-validate="'required|integer'" @input="validate($event)"
               class="form-control"
               :class="{'form-control-danger': errors.has('numeroPedido'), 'form-control-success': this.fields.numeroPedido && this.fields.numeroPedido.valid}"
               id="numeroPedido" name="numeroPedido" placeholder="{{ trans('admin.pedido.columns.numeroPedido') }}">
        <div v-if="errors.has('numeroPedido')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('numeroPedido') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('proveedor_id'), 'has-success': this.fields.proveedor_id && this.fields.proveedor_id.valid }">
    <label for="proveedor_id" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.pedido.columns.proveedor_id') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <multiselect v-model="form.proveedor_id" placeholder="{{ trans('admin.pedido.columns.proveedor_id')}}"
                     :options="{{ $proveedores->toJson()}}.map(type => type.id)"
                     :custom-label="opt => {{$proveedores->toJson()}}.find(x => x.id == opt).empresa"
                     :close-on-select="true"
                     open-direction="bottom"></multiselect>
        <div v-if="errors.has('proveedor_id')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('proveedor_id') }}
        </div>
    </div>
</div>


