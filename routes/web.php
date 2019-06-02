<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/admin-users',                            'Admin\AdminUsersController@index');
    Route::get('/admin/admin-users/create',                     'Admin\AdminUsersController@create');
    Route::post('/admin/admin-users',                           'Admin\AdminUsersController@store');
    Route::get('/admin/admin-users/{adminUser}/edit',           'Admin\AdminUsersController@edit')->name('admin/admin-users/edit');
    Route::post('/admin/admin-users/{adminUser}',               'Admin\AdminUsersController@update')->name('admin/admin-users/update');
    Route::delete('/admin/admin-users/{adminUser}',             'Admin\AdminUsersController@destroy')->name('admin/admin-users/destroy');
    Route::get('/admin/admin-users/{adminUser}/resend-activation','Admin\AdminUsersController@resendActivationEmail')->name('admin/admin-users/resendActivationEmail');
});

/* Auto-generated profile routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/profile',                                'Admin\ProfileController@editProfile');
    Route::post('/admin/profile',                               'Admin\ProfileController@updateProfile');
    Route::get('/admin/password',                               'Admin\ProfileController@editPassword');
    Route::post('/admin/password',                              'Admin\ProfileController@updatePassword');
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/roles',                                  'Admin\RolesController@index');
    Route::get('/admin/roles/create',                           'Admin\RolesController@create');
    Route::post('/admin/roles',                                 'Admin\RolesController@store');
    Route::get('/admin/roles/{role}/edit',                      'Admin\RolesController@edit')->name('admin/roles/edit');
    Route::post('/admin/roles/{role}',                          'Admin\RolesController@update')->name('admin/roles/update');
    Route::delete('/admin/roles/{role}',                        'Admin\RolesController@destroy')->name('admin/roles/destroy');
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/clientes',                               'Admin\ClienteController@index');
    Route::get('/admin/clientes/create',                        'Admin\ClienteController@create');
    Route::post('/admin/clientes',                              'Admin\ClienteController@store');
    Route::get('/admin/clientes/{cliente}/edit',                'Admin\ClienteController@edit')->name('admin/clientes/edit');
    Route::post('/admin/clientes/{cliente}',                    'Admin\ClienteController@update')->name('admin/clientes/update');
    Route::delete('/admin/clientes/{cliente}',                  'Admin\ClienteController@destroy')->name('admin/clientes/destroy');
});


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/detallepedidos',                         'Admin\DetallepedidoController@index');
    Route::get('/admin/detallepedidos/create',                  'Admin\DetallepedidoController@create');
    Route::post('/admin/detallepedidos',                        'Admin\DetallepedidoController@store');
    Route::get('/admin/detallepedidos/{detallepedido}/edit',    'Admin\DetallepedidoController@edit')->name('admin/detallepedidos/edit');
    Route::post('/admin/detallepedidos/{detallepedido}',        'Admin\DetallepedidoController@update')->name('admin/detallepedidos/update');
    Route::delete('/admin/detallepedidos/{detallepedido}',      'Admin\DetallepedidoController@destroy')->name('admin/detallepedidos/destroy');
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/detalleventa',                           'Admin\DetalleventaController@index');
    Route::get('/admin/detalleventa/create',                    'Admin\DetalleventaController@create');
    Route::post('/admin/detalleventa',                          'Admin\DetalleventaController@store');
    Route::get('/admin/detalleventa/{detalleventum}/edit',      'Admin\DetalleventaController@edit')->name('admin/detalleventa/edit');
    Route::post('/admin/detalleventa/{detalleventum}',          'Admin\DetalleventaController@update')->name('admin/detalleventa/update');
    Route::delete('/admin/detalleventa/{detalleventum}',        'Admin\DetalleventaController@destroy')->name('admin/detalleventa/destroy');
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/facturaventa',                           'Admin\FacturaventaController@index');
    Route::get('/admin/facturaventa/create',                    'Admin\FacturaventaController@create');
    Route::post('/admin/facturaventa',                          'Admin\FacturaventaController@store');
    Route::get('/admin/facturaventa/{facturaventum}/edit',      'Admin\FacturaventaController@edit')->name('admin/facturaventa/edit');
    Route::post('/admin/facturaventa/{facturaventum}',          'Admin\FacturaventaController@update')->name('admin/facturaventa/update');
    Route::delete('/admin/facturaventa/{facturaventum}',        'Admin\FacturaventaController@destroy')->name('admin/facturaventa/destroy');
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/ofreproveedors',                         'Admin\OfreproveedorController@index');
    Route::get('/admin/ofreproveedors/create',                  'Admin\OfreproveedorController@create');
    Route::post('/admin/ofreproveedors',                        'Admin\OfreproveedorController@store');
    Route::get('/admin/ofreproveedors/{ofreproveedor}/edit',    'Admin\OfreproveedorController@edit')->name('admin/ofreproveedors/edit');
    Route::post('/admin/ofreproveedors/{ofreproveedor}',        'Admin\OfreproveedorController@update')->name('admin/ofreproveedors/update');
    Route::delete('/admin/ofreproveedors/{ofreproveedor}',      'Admin\OfreproveedorController@destroy')->name('admin/ofreproveedors/destroy');
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/pedidos',                                'Admin\PedidoController@index');
    Route::get('/admin/pedidos/create',                         'Admin\PedidoController@create');
    Route::post('/admin/pedidos',                               'Admin\PedidoController@store');
    Route::get('/admin/pedidos/{pedido}/edit',                  'Admin\PedidoController@edit')->name('admin/pedidos/edit');
    Route::post('/admin/pedidos/{pedido}',                      'Admin\PedidoController@update')->name('admin/pedidos/update');
    Route::delete('/admin/pedidos/{pedido}',                    'Admin\PedidoController@destroy')->name('admin/pedidos/destroy');
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/productos',                              'Admin\ProductoController@index');
    Route::get('/admin/productos/create',                       'Admin\ProductoController@create');
    Route::post('/admin/productos',                             'Admin\ProductoController@store');
    Route::get('/admin/productos/{producto}/edit',              'Admin\ProductoController@edit')->name('admin/productos/edit');
    Route::post('/admin/productos/{producto}',                  'Admin\ProductoController@update')->name('admin/productos/update');
    Route::delete('/admin/productos/{producto}',                'Admin\ProductoController@destroy')->name('admin/productos/destroy');
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/productoproveedors',                     'Admin\ProductoproveedorController@index');
    Route::get('/admin/productoproveedors/create',              'Admin\ProductoproveedorController@create');
    Route::post('/admin/productoproveedors',                    'Admin\ProductoproveedorController@store');
    Route::get('/admin/productoproveedors/{productoproveedor}/edit','Admin\ProductoproveedorController@edit')->name('admin/productoproveedors/edit');
    Route::post('/admin/productoproveedors/{productoproveedor}','Admin\ProductoproveedorController@update')->name('admin/productoproveedors/update');
    Route::delete('/admin/productoproveedors/{productoproveedor}','Admin\ProductoproveedorController@destroy')->name('admin/productoproveedors/destroy');
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/proveedors',                             'Admin\ProveedorController@index');
    Route::get('/admin/proveedors/create',                      'Admin\ProveedorController@create');
    Route::post('/admin/proveedors',                            'Admin\ProveedorController@store');
    Route::get('/admin/proveedors/{proveedor}/edit',            'Admin\ProveedorController@edit')->name('admin/proveedors/edit');
    Route::post('/admin/proveedors/{proveedor}',                'Admin\ProveedorController@update')->name('admin/proveedors/update');
    Route::delete('/admin/proveedors/{proveedor}',              'Admin\ProveedorController@destroy')->name('admin/proveedors/destroy');
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/model-has-permissions', 'Admin\ModelHasPermissionsController@index');
    Route::get('/admin/model-has-permissions/create', 'Admin\ModelHasPermissionsController@create');
    Route::post('/admin/model-has-permissions', 'Admin\ModelHasPermissionsController@store');
    Route::get('/admin/model-has-permissions/{modelHasPermission}/edit', 'Admin\ModelHasPermissionsController@edit')->name('admin/model-has-permissions/edit');
    Route::post('/admin/model-has-permissions/{modelHasPermission}', 'Admin\ModelHasPermissionsController@update')->name('admin/model-has-permissions/update');
    Route::delete('/admin/model-has-permissions/{modelHasPermission}', 'Admin\ModelHasPermissionsController@destroy')->name('admin/model-has-permissions/destroy');
});


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/proveedors', 'Admin\ProveedorController@index');
    Route::get('/admin/proveedors/create', 'Admin\ProveedorController@create');
    Route::post('/admin/proveedors', 'Admin\ProveedorController@store');
    Route::get('/admin/proveedors/{proveedor}/edit', 'Admin\ProveedorController@edit')->name('admin/proveedors/edit');
    Route::post('/admin/proveedors/{proveedor}', 'Admin\ProveedorController@update')->name('admin/proveedors/update');
    Route::delete('/admin/proveedors/{proveedor}', 'Admin\ProveedorController@destroy')->name('admin/proveedors/destroy');
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/productoproveedors', 'Admin\ProductoproveedorController@index');
    Route::get('/admin/productoproveedors/create', 'Admin\ProductoproveedorController@create');
    Route::post('/admin/productoproveedors', 'Admin\ProductoproveedorController@store');
    Route::get('/admin/productoproveedors/{productoproveedor}/edit', 'Admin\ProductoproveedorController@edit')->name('admin/productoproveedors/edit');
    Route::post('/admin/productoproveedors/{productoproveedor}', 'Admin\ProductoproveedorController@update')->name('admin/productoproveedors/update');
    Route::delete('/admin/productoproveedors/{productoproveedor}', 'Admin\ProductoproveedorController@destroy')->name('admin/productoproveedors/destroy');
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/ofreproveedors', 'Admin\OfreproveedorController@index');
    Route::get('/admin/ofreproveedors/create', 'Admin\OfreproveedorController@create');
    Route::post('/admin/ofreproveedors', 'Admin\OfreproveedorController@store');
    Route::get('/admin/ofreproveedors/{ofreproveedor}/edit', 'Admin\OfreproveedorController@edit')->name('admin/ofreproveedors/edit');
    Route::post('/admin/ofreproveedors/{ofreproveedor}', 'Admin\OfreproveedorController@update')->name('admin/ofreproveedors/update');
    Route::delete('/admin/ofreproveedors/{ofreproveedor}', 'Admin\OfreproveedorController@destroy')->name('admin/ofreproveedors/destroy');
});


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/facturaventa', 'Admin\FacturaventaController@index');
    Route::get('/admin/facturaventa/create', 'Admin\FacturaventaController@create');
    Route::post('/admin/facturaventa', 'Admin\FacturaventaController@store');
    Route::get('/admin/facturaventa/{facturaventum}/edit', 'Admin\FacturaventaController@edit')->name('admin/facturaventa/edit');
    Route::post('/admin/facturaventa/{facturaventum}', 'Admin\FacturaventaController@update')->name('admin/facturaventa/update');
    Route::delete('/admin/facturaventa/{facturaventum}', 'Admin\FacturaventaController@destroy')->name('admin/facturaventa/destroy');
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/pedidos', 'Admin\PedidoController@index');
    Route::get('/admin/pedidos/create', 'Admin\PedidoController@create');
    Route::post('/admin/pedidos', 'Admin\PedidoController@store');
    Route::get('/admin/pedidos/{pedido}/edit', 'Admin\PedidoController@edit')->name('admin/pedidos/edit');
    Route::post('/admin/pedidos/{pedido}', 'Admin\PedidoController@update')->name('admin/pedidos/update');
    Route::delete('/admin/pedidos/{pedido}', 'Admin\PedidoController@destroy')->name('admin/pedidos/destroy');
});


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/pedidos', 'Admin\PedidoController@index');
    Route::get('/admin/pedidos/create', 'Admin\PedidoController@create');
    Route::post('/admin/pedidos', 'Admin\PedidoController@store');
    Route::get('/admin/pedidos/{pedido}/edit', 'Admin\PedidoController@edit')->name('admin/pedidos/edit');
    Route::post('/admin/pedidos/{pedido}', 'Admin\PedidoController@update')->name('admin/pedidos/update');
    Route::delete('/admin/pedidos/{pedido}', 'Admin\PedidoController@destroy')->name('admin/pedidos/destroy');
});
