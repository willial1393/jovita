<div class="form-group row align-items-center" :class="{'has-danger': errors.has('codigo'), 'has-success': this.fields.codigo && this.fields.codigo.valid }">
    <label for="codigo" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.producto.columns.codigo') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.codigo" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('codigo'), 'form-control-success': this.fields.codigo && this.fields.codigo.valid}" id="codigo" name="codigo" placeholder="{{ trans('admin.producto.columns.codigo') }}">
        <div v-if="errors.has('codigo')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('codigo') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('nombre'), 'has-success': this.fields.nombre && this.fields.nombre.valid }">
    <label for="nombre" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.producto.columns.nombre') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.nombre" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('nombre'), 'form-control-success': this.fields.nombre && this.fields.nombre.valid}" id="nombre" name="nombre" placeholder="{{ trans('admin.producto.columns.nombre') }}">
        <div v-if="errors.has('nombre')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('nombre') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('unidad'), 'has-success': this.fields.unidad && this.fields.unidad.valid }">
    <label for="unidad" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.producto.columns.unidad') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.unidad" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('unidad'), 'form-control-success': this.fields.unidad && this.fields.unidad.valid}" id="unidad" name="unidad" placeholder="{{ trans('admin.producto.columns.unidad') }}">
        <div v-if="errors.has('unidad')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('unidad') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('precioP'), 'has-success': this.fields.precioP && this.fields.precioP.valid }">
    <label for="precioP" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.producto.columns.precioP') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.precioP" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('precioP'), 'form-control-success': this.fields.precioP && this.fields.precioP.valid}" id="precioP" name="precioP" placeholder="{{ trans('admin.producto.columns.precioP') }}">
        <div v-if="errors.has('precioP')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('precioP') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('estado'), 'has-success': this.fields.estado && this.fields.estado.valid }">
    <label for="estado" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.producto.columns.estado') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.estado" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('estado'), 'form-control-success': this.fields.estado && this.fields.estado.valid}" id="estado" name="estado" placeholder="{{ trans('admin.producto.columns.estado') }}">
        <div v-if="errors.has('estado')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('estado') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('existencia'), 'has-success': this.fields.existencia && this.fields.existencia.valid }">
    <label for="existencia" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.producto.columns.existencia') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.existencia" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('existencia'), 'form-control-success': this.fields.existencia && this.fields.existencia.valid}" id="existencia" name="existencia" placeholder="{{ trans('admin.producto.columns.existencia') }}">
        <div v-if="errors.has('existencia')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('existencia') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('tipo'), 'has-success': this.fields.tipo && this.fields.tipo.valid }">
    <label for="tipo" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.producto.columns.tipo') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.tipo" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('tipo'), 'form-control-success': this.fields.tipo && this.fields.tipo.valid}" id="tipo" name="tipo" placeholder="{{ trans('admin.producto.columns.tipo') }}">
        <div v-if="errors.has('tipo')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('tipo') }}</div>
    </div>
</div>


