<?php

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Brackets\AdminAuth\Models\AdminUser::class, function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'password' => bcrypt($faker->password),
        'remember_token' => null,
        'activated' => true,
        'forbidden' => $faker->boolean(),
        'language' => 'en',
        'deleted_at' => null,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
    ];
});/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Role::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'guard_name' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Cliente::class, function (Faker\Generator $faker) {
    return [
        'documento' => $faker->sentence,
        'tipoDocumento' => $faker->sentence,
        'nombre' => $faker->sentence,
        'telefono' => $faker->sentence,
        'correo' => $faker->sentence,
        
        
    ];
});

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Detallepedido::class, function (Faker\Generator $faker) {
    return [
        'consecutivo' => $faker->randomNumber(5),
        'cantidad' => $faker->randomNumber(5),
        'valorTotal' => $faker->randomNumber(5),
        'estado' => $faker->sentence,
        'pedido_id' => $faker->randomNumber(5),
        'producto_codigo' => $faker->randomNumber(5),
        
        
    ];
});

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Detalleventum::class, function (Faker\Generator $faker) {
    return [
        'consecutivo' => $faker->randomNumber(5),
        'totalVenta' => $faker->randomNumber(5),
        'cantidad' => $faker->randomNumber(5),
        'PrecioUnidad' => $faker->randomNumber(5),
        'estado' => $faker->sentence,
        'facturaVenta_id' => $faker->randomNumber(5),
        'producto_codigo' => $faker->randomNumber(5),
        
        
    ];
});

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Facturaventum::class, function (Faker\Generator $faker) {
    return [
        'numero' => $faker->randomNumber(5),
        'fecha' => $faker->date(),
        'estado' => $faker->sentence,
        'cliente_id' => $faker->randomNumber(5),
        'usuario_id' => $faker->randomNumber(5),
        
        
    ];
});

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Ofreproveedor::class, function (Faker\Generator $faker) {
    return [
        'identificacion' => $faker->randomNumber(5),
        'descuento' => $faker->randomNumber(5),
        'estado' => $faker->sentence,
        'unidad' => $faker->sentence,
        'precio' => $faker->randomNumber(5),
        'proveedor_id' => $faker->randomNumber(5),
        'insumo_id' => $faker->randomNumber(5),
        
        
    ];
});

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Pedido::class, function (Faker\Generator $faker) {
    return [
        'numeroPedido' => $faker->randomNumber(5),
        'estado' => $faker->sentence,
        'fecha' => $faker->date(),
        'proveedor_id' => $faker->randomNumber(5),
        'usuario_id' => $faker->randomNumber(5),
        
        
    ];
});

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Producto::class, function (Faker\Generator $faker) {
    return [
        'codigo' => $faker->sentence,
        'nombre' => $faker->sentence,
        'unidad' => $faker->sentence,
        'precioP' => $faker->randomNumber(5),
        'estado' => $faker->sentence,
        'existencia' => $faker->randomNumber(5),
        'tipo' => $faker->sentence,
        
        
    ];
});

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Productoproveedor::class, function (Faker\Generator $faker) {
    return [
        'producto_id' => $faker->randomNumber(5),
        'ofreProveedor_id' => $faker->randomNumber(5),
        
        
    ];
});

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Proveedor::class, function (Faker\Generator $faker) {
    return [
        'codigo' => $faker->randomNumber(5),
        'empresa' => $faker->sentence,
        'representante' => $faker->sentence,
        'estado' => $faker->sentence,
        
        
    ];
});

