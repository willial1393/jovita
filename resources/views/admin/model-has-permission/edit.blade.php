@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.model-has-permission.actions.edit', ['name' => $modelHasPermission->id]))

@section('body')

    <div class="container-xl">

        <div class="card">

            <model-has-permission-form
                    :action="'{{ $modelHasPermission->resource_url }}'"
                    :data="{{ $modelHasPermission->toJson() }}"
                    inline-template>

                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="this.action"
                      novalidate>

                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.model-has-permission.actions.edit', ['name' => $modelHasPermission->id]) }}
                    </div>

                    <div class="card-body">

                        @include('admin.model-has-permission.components.form-elements')

                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>

                </form>

            </model-has-permission-form>

        </div>

    </div>

@endsection
