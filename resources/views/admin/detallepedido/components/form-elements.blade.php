<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('cantidad'), 'has-success': this.fields.cantidad && this.fields.cantidad.valid }">
    <label for="cantidad" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.detallepedido.columns.cantidad') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.cantidad" v-validate="'numeric|required'" @input="validate($event)"
               class="form-control"
               :class="{'form-control-danger': errors.has('cantidad'), 'form-control-success': this.fields.cantidad && this.fields.cantidad.valid}"
               id="cantidad" name="cantidad" placeholder="{{ trans('admin.detallepedido.columns.cantidad') }}">
        <div v-if="errors.has('cantidad')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('cantidad')
            }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('estado'), 'has-success': this.fields.estado && this.fields.estado.valid }">
    <label for="estado" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.detallepedido.columns.estado') }}</label>
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
     :class="{'has-danger': errors.has('pedido_id'), 'has-success': this.fields.pedido_id && this.fields.pedido_id.valid }">
    <label for="pedido_id" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.detallepedido.columns.pedido_id') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <multiselect v-model="form.pedido_id" placeholder="{{  trans('admin.detallepedido.columns.pedido_id')  }}"
                     :allow-empty="false"
                     :options="{{ $pedidos->toJson()}}.map(type => type.id)"
                     :custom-label="opt => {{$pedidos->toJson()}}.find(x => x.id == opt).numeroPedido"
                     :close-on-select="true"
                     open-direction="bottom"></multiselect>
        <div v-if="errors.has('pedido_id')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('pedido_id') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('producto_codigo'), 'has-success': this.fields.producto_codigo && this.fields.producto_codigo.valid }">
    <label for="producto_codigo" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.detallepedido.columns.producto_codigo') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <multiselect v-model="form.producto_codigo"
                     :allow-empty="false"
                     placeholder="{{  trans('admin.detallepedido.columns.producto_codigo')  }}"
                     :options="{{ $productos->toJson()}}.map(type => type.id)"
                     :custom-label="opt => {{$productos->toJson()}}.find(x => x.id == opt).codigo"
                     :close-on-select="true"
                     open-direction="bottom"></multiselect>
        <div v-if="errors.has('producto_codigo')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('producto_codigo') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('valorTotal'), 'has-success': this.fields.valorTotal && this.fields.valorTotal.valid }">
    <label for="valorTotal" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.detallepedido.columns.valorTotal') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.valorTotal" v-validate="'required|numeric'" @input="validate($event)"
               class="form-control"
               :class="{'form-control-danger': errors.has('valorTotal'), 'form-control-success': this.fields.valorTotal && this.fields.valorTotal.valid}"
               id="valorTotal" name="valorTotal" placeholder="{{ trans('admin.detallepedido.columns.valorTotal') }}">
        <div v-if="errors.has('valorTotal')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('valorTotal') }}
        </div>
    </div>
</div>


