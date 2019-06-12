<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Producto\DestroyProducto;
use App\Http\Requests\Admin\Producto\IndexProducto;
use App\Http\Requests\Admin\Producto\StoreProducto;
use App\Http\Requests\Admin\Producto\UpdateProducto;
use App\Models\EstadoProductos;
use App\Models\Producto;
use App\Models\TiposProductos;
use Brackets\AdminListing\Facades\AdminListing;
use Illuminate\Http\Response;

class ProductoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexProducto $request
     * @return Response|array
     */
    public function index(IndexProducto $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Producto::class)->processRequestAndGet(
        // pass the request with params
            $request,

            // set columns to query
            ['id', 'codigo', 'nombre', 'unidad', 'precioP', 'estado', 'existencia', 'tipo'],

            // set columns to searchIn
            ['id', 'codigo', 'nombre', 'unidad', 'estado', 'tipo']
        );

        if ($request->ajax()) {
            return ['data' => $data];
        }

        return view('admin.producto.index', ['data' => $data]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $producto = new Producto();
        $producto->estado = EstadoProductos::all()->first()->name;
        $producto->tipo = TiposProductos::all()->first()->name;
        $this->authorize('admin.producto.create');

        return view('admin.producto.create')
            ->with('producto', $producto)
            ->with('estados', EstadoProductos::all())
            ->with('tipos', TiposProductos::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreProducto $request
     * @return Response|array
     */
    public function store(StoreProducto $request)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Store the Producto
        $producto = Producto::create($sanitized);
        if ($request->ajax()) {
            return ['redirect' => url('admin/productos'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/productos');
    }

    /**
     * Display the specified resource.
     *
     * @param Producto $producto
     * @return void
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Producto $producto)
    {
        $this->authorize('admin.producto.show', $producto);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Producto $producto
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Producto $producto)
    {
        $this->authorize('admin.producto.edit', $producto);

        return view('admin.producto.edit', [
            'producto' => $producto,
        ])->with('estados', EstadoProductos::all())
            ->with('tipos', TiposProductos::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateProducto $request
     * @param Producto $producto
     * @return Response|array
     */
    public function update(UpdateProducto $request, Producto $producto)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Update changed values Producto
        $producto->update($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/productos'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/productos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyProducto $request
     * @param Producto $producto
     * @return Response|bool
     * @throws \Exception
     */
    public function destroy(DestroyProducto $request, Producto $producto)
    {
        $producto->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

}
