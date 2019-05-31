<div class="form-group row align-items-center" :class="{'has-danger': errors.has('consecutivo'), 'has-success': this.fields.consecutivo && this.fields.consecutivo.valid }">
    <label for="consecutivo" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.detalleventum.columns.consecutivo') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.consecutivo" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('consecutivo'), 'form-control-success': this.fields.consecutivo && this.fields.consecutivo.valid}" id="consecutivo" name="consecutivo" placeholder="{{ trans('admin.detalleventum.columns.consecutivo') }}">
        <div v-if="errors.has('consecutivo')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('consecutivo') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('totalVenta'), 'has-success': this.fields.totalVenta && this.fields.totalVenta.valid }">
    <label for="totalVenta" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.detalleventum.columns.totalVenta') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.totalVenta" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('totalVenta'), 'form-control-success': this.fields.totalVenta && this.fields.totalVenta.valid}" id="totalVenta" name="totalVenta" placeholder="{{ trans('admin.detalleventum.columns.totalVenta') }}">
        <div v-if="errors.has('totalVenta')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('totalVenta') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('cantidad'), 'has-success': this.fields.cantidad && this.fields.cantidad.valid }">
    <label for="cantidad" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.detalleventum.columns.cantidad') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.cantidad" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('cantidad'), 'form-control-success': this.fields.cantidad && this.fields.cantidad.valid}" id="cantidad" name="cantidad" placeholder="{{ trans('admin.detalleventum.columns.cantidad') }}">
        <div v-if="errors.has('cantidad')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('cantidad') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('PrecioUnidad'), 'has-success': this.fields.PrecioUnidad && this.fields.PrecioUnidad.valid }">
    <label for="PrecioUnidad" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.detalleventum.columns.PrecioUnidad') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.PrecioUnidad" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('PrecioUnidad'), 'form-control-success': this.fields.PrecioUnidad && this.fields.PrecioUnidad.valid}" id="PrecioUnidad" name="PrecioUnidad" placeholder="{{ trans('admin.detalleventum.columns.PrecioUnidad') }}">
        <div v-if="errors.has('PrecioUnidad')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('PrecioUnidad') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('estado'), 'has-success': this.fields.estado && this.fields.estado.valid }">
    <label for="estado" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.detalleventum.columns.estado') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.estado" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('estado'), 'form-control-success': this.fields.estado && this.fields.estado.valid}" id="estado" name="estado" placeholder="{{ trans('admin.detalleventum.columns.estado') }}">
        <div v-if="errors.has('estado')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('estado') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('facturaVenta_id'), 'has-success': this.fields.facturaVenta_id && this.fields.facturaVenta_id.valid }">
    <label for="facturaVenta_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.detalleventum.columns.facturaVenta_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.facturaVenta_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('facturaVenta_id'), 'form-control-success': this.fields.facturaVenta_id && this.fields.facturaVenta_id.valid}" id="facturaVenta_id" name="facturaVenta_id" placeholder="{{ trans('admin.detalleventum.columns.facturaVenta_id') }}">
        <div v-if="errors.has('facturaVenta_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('facturaVenta_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('producto_codigo'), 'has-success': this.fields.producto_codigo && this.fields.producto_codigo.valid }">
    <label for="producto_codigo" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.detalleventum.columns.producto_codigo') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.producto_codigo" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('producto_codigo'), 'form-control-success': this.fields.producto_codigo && this.fields.producto_codigo.valid}" id="producto_codigo" name="producto_codigo" placeholder="{{ trans('admin.detalleventum.columns.producto_codigo') }}">
        <div v-if="errors.has('producto_codigo')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('producto_codigo') }}</div>
    </div>
</div>


