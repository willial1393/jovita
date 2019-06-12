<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('documento'), 'has-success': this.fields.documento && this.fields.documento.valid }">
    <label for="documento" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cliente.columns.documento') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.documento" v-validate="{required:true,regex: /^([0-9]+)$/}"
               @input="validate($event)"
               class="form-control"
               :class="{'form-control-danger': errors.has('documento'), 'form-control-success': this.fields.documento && this.fields.documento.valid}"
               id="documento" name="documento" placeholder="{{ trans('admin.cliente.columns.documento') }}">
        <div v-if="errors.has('documento')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('documento') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('tipoDocumento'), 'has-success': this.fields.tipoDocumento && this.fields.tipoDocumento.valid }">
    <label for="tipoDocumento" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cliente.columns.tipoDocumento') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <multiselect v-model="form.tipoDocumento" placeholder="{{ trans('admin.cliente.columns.tipoDocumento') }}"
                     :allow-empty="false"
                     :options="{{ $documentos->toJson()}}.map(type => type.type)"
                     :custom-label="opt => {{$documentos->toJson()}}.find(x => x.type == opt).name"
                     :close-on-select="true"
                     open-direction="bottom"></multiselect>
        <div v-if="errors.has('tipoDocumento')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('tipoDocumento') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('nombre'), 'has-success': this.fields.nombre && this.fields.nombre.valid }">
    <label for="nombre" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cliente.columns.nombre') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.nombre" v-validate="'required|alpha_spaces'" @input="validate($event)"
               class="form-control"
               :class="{'form-control-danger': errors.has('nombre'), 'form-control-success': this.fields.nombre && this.fields.nombre.valid}"
               id="nombre" name="nombre" placeholder="{{ trans('admin.cliente.columns.nombre') }}">
        <div v-if="errors.has('nombre')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('nombre') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('telefono'), 'has-success': this.fields.telefono && this.fields.telefono.valid }">
    <label for="telefono" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cliente.columns.telefono') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.telefono" v-validate="'required|numeric|max:10'"
               @input="validate($event)" class="form-control"
               :class="{'form-control-danger': errors.has('telefono'), 'form-control-success': this.fields.telefono && this.fields.telefono.valid}"
               id="telefono" name="telefono" placeholder="{{ trans('admin.cliente.columns.telefono') }}">
        <div v-if="errors.has('telefono')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('telefono')
            }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('correo'), 'has-success': this.fields.correo && this.fields.correo.valid }">
    <label for="correo" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cliente.columns.correo') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.correo" v-validate="'required|email'" @input="validate($event)"
               class="form-control"
               :class="{'form-control-danger': errors.has('correo'), 'form-control-success': this.fields.correo && this.fields.correo.valid}"
               id="correo" name="correo" placeholder="{{ trans('admin.cliente.columns.correo') }}">
        <div v-if="errors.has('correo')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('correo') }}
        </div>
    </div>
</div>


