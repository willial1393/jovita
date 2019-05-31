@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.productoproveedor.actions.edit', ['name' => $productoproveedor->id]))

@section('body')

    <div class="container-xl">

        <div class="card">

            <productoproveedor-form
                :action="'{{ $productoproveedor->resource_url }}'"
                :data="{{ $productoproveedor->toJson() }}"
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="this.action" novalidate>

                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.productoproveedor.actions.edit', ['name' => $productoproveedor->id]) }}
                    </div>

                    <div class="card-body">

                        @include('admin.productoproveedor.components.form-elements')

                    </div>

                    <div class="card-footer">
	                    <button type="submit" class="btn btn-primary" :disabled="submiting">
		                    <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
		                    {{ trans('brackets/admin-ui::admin.btn.save') }}
	                    </button>
                    </div>

                </form>

        </productoproveedor-form>

    </div>

</div>

@endsection