<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Productoproveedor\DestroyProductoproveedor;
use App\Http\Requests\Admin\Productoproveedor\IndexProductoproveedor;
use App\Http\Requests\Admin\Productoproveedor\StoreProductoproveedor;
use App\Http\Requests\Admin\Productoproveedor\UpdateProductoproveedor;
use App\Models\Producto;
use App\Models\Productoproveedor;
use App\Models\Proveedor;
use Illuminate\Http\Response;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductoproveedorController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexProductoproveedor $request
     * @return Response|array
     */
    public function index(IndexProductoproveedor $request)
    {
        $prueba = Productoproveedor::with('producto')
            ->with('proveedor')
            ->get();

        if ($request->has('search')) {
            $proveedor = Proveedor::where('empresa', 'like', '%' . $request->search . '%')->first();
            $prueba = $prueba->where('proveedor_id', $proveedor->id)->all();
        }
        $paginator = new LengthAwarePaginator($prueba, count($prueba), 10, 1);

        if ($request->ajax()) {
            return ['data' => $paginator];
        }

        return view('admin.productoproveedor.index', ['data' => $paginator]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('admin.productoproveedor.create');

        return view('admin.productoproveedor.create')
            ->with('productos', Producto::get())
            ->with('proveedores', Proveedor::get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreProductoproveedor $request
     * @return Response|array
     */
    public function store(StoreProductoproveedor $request)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Store the Productoproveedor
        $productoproveedor = Productoproveedor::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/productoproveedors'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/productoproveedors');
    }

    /**
     * Display the specified resource.
     *
     * @param Productoproveedor $productoproveedor
     * @return void
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Productoproveedor $productoproveedor)
    {
        $this->authorize('admin.productoproveedor.show', $productoproveedor);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Productoproveedor $productoproveedor
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Productoproveedor $productoproveedor)
    {
        $this->authorize('admin.productoproveedor.edit', $productoproveedor);

        return view('admin.productoproveedor.edit', [
            'productoproveedor' => $productoproveedor,
        ])->with('productos', Producto::get())
            ->with('proveedores', Proveedor::get());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateProductoproveedor $request
     * @param Productoproveedor $productoproveedor
     * @return Response|array
     */
    public function update(UpdateProductoproveedor $request, Productoproveedor $productoproveedor)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Update changed values Productoproveedor
        $productoproveedor->update($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/productoproveedors'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/productoproveedors');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyProductoproveedor $request
     * @param Productoproveedor $productoproveedor
     * @return Response|bool
     * @throws \Exception
     */
    public function destroy(DestroyProductoproveedor $request, Productoproveedor $productoproveedor)
    {
        $productoproveedor->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

}
