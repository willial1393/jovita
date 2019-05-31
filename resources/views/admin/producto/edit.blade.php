@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.producto.actions.edit', ['name' => $producto->id]))

@section('body')

    <div class="container-xl">

        <div class="card">

            <producto-form
                :action="'{{ $producto->resource_url }}'"
                :data="{{ $producto->toJson() }}"
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="this.action" novalidate>

                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.producto.actions.edit', ['name' => $producto->id]) }}
                    </div>

                    <div class="card-body">

                        @include('admin.producto.components.form-elements')

                    </div>

                    <div class="card-footer">
	                    <button type="submit" class="btn btn-primary" :disabled="submiting">
		                    <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
		                    {{ trans('brackets/admin-ui::admin.btn.save') }}
	                    </button>
                    </div>

                </form>

        </producto-form>

    </div>

</div>

@endsection