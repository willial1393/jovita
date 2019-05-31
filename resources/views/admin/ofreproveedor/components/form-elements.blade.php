<div class="form-group row align-items-center" :class="{'has-danger': errors.has('identificacion'), 'has-success': this.fields.identificacion && this.fields.identificacion.valid }">
    <label for="identificacion" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.ofreproveedor.columns.identificacion') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.identificacion" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('identificacion'), 'form-control-success': this.fields.identificacion && this.fields.identificacion.valid}" id="identificacion" name="identificacion" placeholder="{{ trans('admin.ofreproveedor.columns.identificacion') }}">
        <div v-if="errors.has('identificacion')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('identificacion') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('descuento'), 'has-success': this.fields.descuento && this.fields.descuento.valid }">
    <label for="descuento" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.ofreproveedor.columns.descuento') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.descuento" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('descuento'), 'form-control-success': this.fields.descuento && this.fields.descuento.valid}" id="descuento" name="descuento" placeholder="{{ trans('admin.ofreproveedor.columns.descuento') }}">
        <div v-if="errors.has('descuento')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('descuento') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('estado'), 'has-success': this.fields.estado && this.fields.estado.valid }">
    <label for="estado" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.ofreproveedor.columns.estado') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.estado" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('estado'), 'form-control-success': this.fields.estado && this.fields.estado.valid}" id="estado" name="estado" placeholder="{{ trans('admin.ofreproveedor.columns.estado') }}">
        <div v-if="errors.has('estado')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('estado') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('unidad'), 'has-success': this.fields.unidad && this.fields.unidad.valid }">
    <label for="unidad" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.ofreproveedor.columns.unidad') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.unidad" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('unidad'), 'form-control-success': this.fields.unidad && this.fields.unidad.valid}" id="unidad" name="unidad" placeholder="{{ trans('admin.ofreproveedor.columns.unidad') }}">
        <div v-if="errors.has('unidad')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('unidad') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('precio'), 'has-success': this.fields.precio && this.fields.precio.valid }">
    <label for="precio" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.ofreproveedor.columns.precio') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.precio" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('precio'), 'form-control-success': this.fields.precio && this.fields.precio.valid}" id="precio" name="precio" placeholder="{{ trans('admin.ofreproveedor.columns.precio') }}">
        <div v-if="errors.has('precio')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('precio') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('proveedor_id'), 'has-success': this.fields.proveedor_id && this.fields.proveedor_id.valid }">
    <label for="proveedor_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.ofreproveedor.columns.proveedor_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.proveedor_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('proveedor_id'), 'form-control-success': this.fields.proveedor_id && this.fields.proveedor_id.valid}" id="proveedor_id" name="proveedor_id" placeholder="{{ trans('admin.ofreproveedor.columns.proveedor_id') }}">
        <div v-if="errors.has('proveedor_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('proveedor_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('insumo_id'), 'has-success': this.fields.insumo_id && this.fields.insumo_id.valid }">
    <label for="insumo_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.ofreproveedor.columns.insumo_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.insumo_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('insumo_id'), 'form-control-success': this.fields.insumo_id && this.fields.insumo_id.valid}" id="insumo_id" name="insumo_id" placeholder="{{ trans('admin.ofreproveedor.columns.insumo_id') }}">
        <div v-if="errors.has('insumo_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('insumo_id') }}</div>
    </div>
</div>


