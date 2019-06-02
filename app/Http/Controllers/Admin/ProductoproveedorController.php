<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Productoproveedor\DestroyProductoproveedor;
use App\Http\Requests\Admin\Productoproveedor\IndexProductoproveedor;
use App\Http\Requests\Admin\Productoproveedor\StoreProductoproveedor;
use App\Http\Requests\Admin\Productoproveedor\UpdateProductoproveedor;
use App\Models\Productoproveedor;
use Brackets\AdminListing\Facades\AdminListing;
use Illuminate\Http\Response;

class ProductoproveedorController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param  IndexProductoproveedor $request
     * @return Response|array
     */
    public function index(IndexProductoproveedor $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Productoproveedor::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'producto_id', 'proveedor_id'],

            // set columns to searchIn
            ['id']
        );

        if ($request->ajax()) {
            return ['data' => $data];
        }

        return view('admin.productoproveedor.index', ['data' => $data]);

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

        return view('admin.productoproveedor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreProductoproveedor $request
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
     * @param  Productoproveedor $productoproveedor
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
     * @param  Productoproveedor $productoproveedor
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Productoproveedor $productoproveedor)
    {
        $this->authorize('admin.productoproveedor.edit', $productoproveedor);

        return view('admin.productoproveedor.edit', [
            'productoproveedor' => $productoproveedor,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateProductoproveedor $request
     * @param  Productoproveedor $productoproveedor
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
     * @param  DestroyProductoproveedor $request
     * @param  Productoproveedor $productoproveedor
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
