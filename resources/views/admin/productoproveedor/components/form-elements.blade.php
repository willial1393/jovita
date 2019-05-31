<div class="form-group row align-items-center" :class="{'has-danger': errors.has('producto_id'), 'has-success': this.fields.producto_id && this.fields.producto_id.valid }">
    <label for="producto_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.productoproveedor.columns.producto_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.producto_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('producto_id'), 'form-control-success': this.fields.producto_id && this.fields.producto_id.valid}" id="producto_id" name="producto_id" placeholder="{{ trans('admin.productoproveedor.columns.producto_id') }}">
        <div v-if="errors.has('producto_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('producto_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('ofreProveedor_id'), 'has-success': this.fields.ofreProveedor_id && this.fields.ofreProveedor_id.valid }">
    <label for="ofreProveedor_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.productoproveedor.columns.ofreProveedor_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.ofreProveedor_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('ofreProveedor_id'), 'form-control-success': this.fields.ofreProveedor_id && this.fields.ofreProveedor_id.valid}" id="ofreProveedor_id" name="ofreProveedor_id" placeholder="{{ trans('admin.productoproveedor.columns.ofreProveedor_id') }}">
        <div v-if="errors.has('ofreProveedor_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('ofreProveedor_id') }}</div>
    </div>
</div>


