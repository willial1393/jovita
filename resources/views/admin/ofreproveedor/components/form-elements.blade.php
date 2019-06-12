<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('descuento'), 'has-success': this.fields.descuento && this.fields.descuento.valid }">
    <label for="descuento" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.ofreproveedor.columns.descuento') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.descuento" v-validate="'required|numeric'" @input="validate($event)"
               class="form-control"
               :class="{'form-control-danger': errors.has('descuento'), 'form-control-success': this.fields.descuento && this.fields.descuento.valid}"
               id="descuento" name="descuento" placeholder="{{ trans('admin.ofreproveedor.columns.descuento') }}">
        <div v-if="errors.has('descuento')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('descuento') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('estado'), 'has-success': this.fields.estado && this.fields.estado.valid }">
    <label for="estado" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.ofreproveedor.columns.estado') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <multiselect v-model="form.estado" placeholder="{{ trans('admin.ofreproveedor.columns.estado') }}"
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
     :class="{'has-danger': errors.has('identificacion'), 'has-success': this.fields.identificacion && this.fields.identificacion.valid }">
    <label for="identificacion" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.ofreproveedor.columns.identificacion') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.identificacion" v-validate="'required|numeric'" @input="validate($event)"
               class="form-control"
               :class="{'form-control-danger': errors.has('identificacion'), 'form-control-success': this.fields.identificacion && this.fields.identificacion.valid}"
               id="identificacion" name="identificacion"
               placeholder="{{ trans('admin.ofreproveedor.columns.identificacion') }}">
        <div v-if="errors.has('identificacion')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('identificacion') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('precio'), 'has-success': this.fields.precio && this.fields.precio.valid }">
    <label for="precio" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.ofreproveedor.columns.precio') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.precio" v-validate="'required|numeric'" @input="validate($event)"
               class="form-control"
               :class="{'form-control-danger': errors.has('precio'), 'form-control-success': this.fields.precio && this.fields.precio.valid}"
               id="precio" name="precio" placeholder="{{ trans('admin.ofreproveedor.columns.precio') }}">
        <div v-if="errors.has('precio')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('precio') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('producto_id'), 'has-success': this.fields.producto_id && this.fields.producto_id.valid }">
    <label for="producto_id" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.ofreproveedor.columns.producto_id') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <multiselect v-model="form.producto_id" placeholder="{{trans('admin.ofreproveedor.columns.producto_id') }}"
                     :allow-empty="false"
                     :options="{{ $productos->toJson()}}.map(type => type.id)"
                     :custom-label="opt => {{$productos->toJson()}}.find(x => x.id == opt).nombre"
                     :close-on-select="true"
                     open-direction="bottom"></multiselect>
        <div v-if="errors.has('producto_id')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('producto_id') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('proveedor_id'), 'has-success': this.fields.proveedor_id && this.fields.proveedor_id.valid }">
    <label for="proveedor_id" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.ofreproveedor.columns.proveedor_id') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <multiselect v-model="form.proveedor_id" placeholder="{{trans('admin.ofreproveedor.columns.proveedor_id') }}"
                     :allow-empty="false"
                     :options="{{ $proveedores->toJson()}}.map(type => type.id)"
                     :custom-label="opt => {{$proveedores->toJson()}}.find(x => x.id == opt).empresa"
                     :close-on-select="true"
                     open-direction="bottom"></multiselect>
        <div v-if="errors.has('proveedor_id')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('proveedor_id') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('unidad'), 'has-success': this.fields.unidad && this.fields.unidad.valid }">
    <label for="unidad" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.ofreproveedor.columns.unidad') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.unidad" v-validate="'required|alpha_num'" @input="validate($event)"
               class="form-control"
               :class="{'form-control-danger': errors.has('unidad'), 'form-control-success': this.fields.unidad && this.fields.unidad.valid}"
               id="unidad" name="unidad" placeholder="{{ trans('admin.ofreproveedor.columns.unidad') }}">
        <div v-if="errors.has('unidad')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('unidad') }}
        </div>
    </div>
</div>


