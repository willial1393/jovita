<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.content') }}</li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/clientes') }}"><i class="nav-icon icon-drop"></i> {{ trans('admin.cliente.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/productos') }}"><i
                            class="nav-icon icon-globe"></i> {{ trans('admin.producto.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/facturaventa') }}"><i
                            class="nav-icon icon-energy"></i> {{ trans('admin.facturaventum.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/detalleventa') }}"><i
                            class="nav-icon icon-ghost"></i> {{ trans('admin.detalleventum.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/pedidos') }}"><i
                            class="nav-icon icon-umbrella"></i> {{ trans('admin.pedido.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/detallepedidos') }}"><i
                            class="nav-icon icon-star"></i> {{ trans('admin.detallepedido.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/proveedors') }}"><i
                            class="nav-icon icon-flag"></i> {{ trans('admin.proveedor.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/productoproveedors') }}"><i
                            class="nav-icon icon-ghost"></i> {{ trans('admin.productoproveedor.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/ofreproveedors') }}"><i
                            class="nav-icon icon-drop"></i> {{ trans('admin.ofreproveedor.title') }}</a></li>
           {{-- Do not delete me :) I'm used for auto-generation menu items --}}

            <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.settings') }}</li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/model-has-permissions') }}"><i
                            class="nav-icon icon-drop"></i> {{ trans('admin.model-has-permission.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/roles') }}"><i class="nav-icon icon-puzzle"></i> {{ trans('admin.role.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/admin-users') }}"><i class="nav-icon icon-user"></i> {{ __('Manage access') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/translations') }}"><i class="nav-icon icon-location-pin"></i> {{ __('Translations') }}</a></li>
            {{-- Do not delete me :) I'm also used for auto-generation menu items --}}
            {{--<li class="nav-item"><a class="nav-link" href="{{ url('admin/configuration') }}"><i class="nav-icon icon-settings"></i> {{ __('Configuration') }}</a></li>--}}
        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
