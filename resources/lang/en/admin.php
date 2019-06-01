<?php

return [
    'admin-user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
            'edit_profile' => 'Edit Profile',
            'edit_password' => 'Edit Password',
        ],

        'columns' => [
            'id' => "ID",
            'first_name' => "First name",
            'last_name' => "Last name",
            'email' => "Email",
            'password' => "Password",
            'password_repeat' => "Password Confirmation",
            'activated' => "Activated",
            'forbidden' => "Forbidden",
            'language' => "Language",
                
            //Belongs to many relations
            'roles' => "Roles",
                
        ],
    ],

    'role' => [
        'title' => 'Roles',

        'actions' => [
            'index' => 'Roles',
            'create' => 'New Role',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => "ID",
            'name' => "Name",
            'guard_name' => "Guard name",
            
        ],
    ],

    'cliente' => [
        'title' => 'Cliente',

        'actions' => [
            'index' => 'Cliente',
            'create' => 'New Cliente',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => "ID",
            'documento' => "Documento",
            'tipoDocumento' => "TipoDocumento",
            'nombre' => "Nombre",
            'telefono' => "Telefono",
            'correo' => "Correo",
            
        ],
    ],

    'detallepedido' => [
        'title' => 'Detallepedido',

        'actions' => [
            'index' => 'Detallepedido',
            'create' => 'New Detallepedido',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => "ID",
            'consecutivo' => "Consecutivo",
            'cantidad' => "Cantidad",
            'valorTotal' => "ValorTotal",
            'estado' => "Estado",
            'pedido_id' => "Pedido",
            'producto_codigo' => "Producto codigo",
            
        ],
    ],

    'detalleventum' => [
        'title' => 'Detalleventa',

        'actions' => [
            'index' => 'Detalleventa',
            'create' => 'New Detalleventum',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => "ID",
            'consecutivo' => "Consecutivo",
            'totalVenta' => "TotalVenta",
            'cantidad' => "Cantidad",
            'PrecioUnidad' => "PrecioUnidad",
            'estado' => "Estado",
            'facturaVenta_id' => "FacturaVenta",
            'producto_codigo' => "Producto codigo",
            
        ],
    ],

    'facturaventum' => [
        'title' => 'Facturaventa',

        'actions' => [
            'index' => 'Facturaventa',
            'create' => 'New Facturaventum',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => "ID",
            'numero' => "Numero",
            'fecha' => "Fecha",
            'estado' => "Estado",
            'cliente_id' => "Cliente",
            'usuario_id' => "Usuario",
            
        ],
    ],

    'ofreproveedor' => [
        'title' => 'Ofreproveedor',

        'actions' => [
            'index' => 'Ofreproveedor',
            'create' => 'New Ofreproveedor',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => "ID",
            'identificacion' => "Identificacion",
            'descuento' => "Descuento",
            'estado' => "Estado",
            'unidad' => "Unidad",
            'precio' => "Precio",
            'proveedor_id' => "Proveedor",
            'insumo_id' => "Insumo",
            
        ],
    ],

    'pedido' => [
        'title' => 'Pedido',

        'actions' => [
            'index' => 'Pedido',
            'create' => 'New Pedido',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => "ID",
            'numeroPedido' => "NumeroPedido",
            'estado' => "Estado",
            'fecha' => "Fecha",
            'proveedor_id' => "Proveedor",
            'usuario_id' => "Usuario",
            
        ],
    ],

    'producto' => [
        'title' => 'Producto',

        'actions' => [
            'index' => 'Producto',
            'create' => 'New Producto',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => "ID",
            'codigo' => "Codigo",
            'nombre' => "Nombre",
            'unidad' => "Unidad",
            'precioP' => "PrecioP",
            'estado' => "Estado",
            'existencia' => "Existencia",
            'tipo' => "Tipo",
            
        ],
    ],

    'productoproveedor' => [
        'title' => 'Productoproveedor',

        'actions' => [
            'index' => 'Productoproveedor',
            'create' => 'New Productoproveedor',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => "ID",
            'producto_id' => "Producto",
            'ofreProveedor_id' => "OfreProveedor",
            
        ],
    ],

    'proveedor' => [
        'title' => 'Proveedor',

        'actions' => [
            'index' => 'Proveedor',
            'create' => 'New Proveedor',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => "ID",
            'codigo' => "Codigo",
            'empresa' => "Empresa",
            'representante' => "Representante",
            'estado' => "Estado",
            
        ],
    ],

    'model-has-permission' => [
        'title' => 'Model Has Permissions',

        'actions' => [
            'index' => 'Model Has Permissions',
            'create' => 'New Model Has Permission',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => "ID",
            'permission_id' => "Permission",
            'model_type' => "Model type",
            'model_id' => "Model",

        ],
    ],

    // Do not delete me :) I'm used for auto-generation
];
