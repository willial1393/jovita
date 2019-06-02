<div class="form-group row align-items-center" :class="{'has-danger': errors.has('codigo'), 'has-success': this.fields.codigo && this.fields.codigo.valid }">
    <label for="codigo" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.proveedor.columns.codigo') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.codigo" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('codigo'), 'form-control-success': this.fields.codigo && this.fields.codigo.valid}" id="codigo" name="codigo" placeholder="{{ trans('admin.proveedor.columns.codigo') }}">
        <div v-if="errors.has('codigo')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('codigo') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('empresa'), 'has-success': this.fields.empresa && this.fields.empresa.valid }">
    <label for="empresa" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.proveedor.columns.empresa') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.empresa" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('empresa'), 'form-control-success': this.fields.empresa && this.fields.empresa.valid}" id="empresa" name="empresa" placeholder="{{ trans('admin.proveedor.columns.empresa') }}">
        <div v-if="errors.has('empresa')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('empresa') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('estado'), 'has-success': this.fields.estado && this.fields.estado.valid }">
    <label for="estado" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.proveedor.columns.estado') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.estado" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('estado'), 'form-control-success': this.fields.estado && this.fields.estado.valid}" id="estado" name="estado" placeholder="{{ trans('admin.proveedor.columns.estado') }}">
        <div v-if="errors.has('estado')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('estado') }}</div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('representante'), 'has-success': this.fields.representante && this.fields.representante.valid }">
    <label for="representante" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.proveedor.columns.representante') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.representante" v-validate="''" @input="validate($event)" class="form-control"
               :class="{'form-control-danger': errors.has('representante'), 'form-control-success': this.fields.representante && this.fields.representante.valid}"
               id="representante" name="representante"
               placeholder="{{ trans('admin.proveedor.columns.representante') }}">
        <div v-if="errors.has('representante')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('representante') }}
        </div>
    </div>
</div>


