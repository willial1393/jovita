@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.facturaventum.actions.edit', ['name' => $facturaventum->id]))

@section('body')

    <div class="container-xl">

        <div class="card">

            <facturaventum-form
                :action="'{{ $facturaventum->resource_url }}'"
                :data="{{ $facturaventum->toJson() }}"
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="this.action" novalidate>

                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.facturaventum.actions.edit', ['name' => $facturaventum->id]) }}
                    </div>

                    <div class="card-body">

                        @include('admin.facturaventum.components.form-elements')

                    </div>

                    <div class="card-footer">
	                    <button type="submit" class="btn btn-primary" :disabled="submiting">
		                    <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
		                    {{ trans('brackets/admin-ui::admin.btn.save') }}
	                    </button>
                    </div>

                </form>

        </facturaventum-form>

    </div>

</div>

@endsection