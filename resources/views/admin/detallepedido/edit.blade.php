@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.detallepedido.actions.edit', ['name' => $detallepedido->id]))

@section('body')

    <div class="container-xl">

        <div class="card">

            <detallepedido-form
                :action="'{{ $detallepedido->resource_url }}'"
                :data="{{ $detallepedido->toJson() }}"
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="this.action" novalidate>

                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.detallepedido.actions.edit', ['name' => $detallepedido->id]) }}
                    </div>

                    <div class="card-body">

                        @include('admin.detallepedido.components.form-elements')

                    </div>

                    <div class="card-footer">
	                    <button type="submit" class="btn btn-primary" :disabled="submiting">
		                    <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
		                    {{ trans('brackets/admin-ui::admin.btn.save') }}
	                    </button>
                    </div>

                </form>

        </detallepedido-form>

    </div>

</div>

@endsection