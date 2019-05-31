<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\Admin\Proveedor\IndexProveedor;
use App\Http\Requests\Admin\Proveedor\StoreProveedor;
use App\Http\Requests\Admin\Proveedor\UpdateProveedor;
use App\Http\Requests\Admin\Proveedor\DestroyProveedor;
use Brackets\AdminListing\Facades\AdminListing;
use App\Models\Proveedor;

class ProveedorController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param  IndexProveedor $request
     * @return Response|array
     */
    public function index(IndexProveedor $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Proveedor::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'codigo', 'empresa', 'representante', 'estado'],

            // set columns to searchIn
            ['id', 'empresa', 'representante', 'estado']
        );

        if ($request->ajax()) {
            return ['data' => $data];
        }

        return view('admin.proveedor.index', ['data' => $data]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('admin.proveedor.create');

        return view('admin.proveedor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreProveedor $request
     * @return Response|array
     */
    public function store(StoreProveedor $request)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Store the Proveedor
        $proveedor = Proveedor::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/proveedors'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/proveedors');
    }

    /**
     * Display the specified resource.
     *
     * @param  Proveedor $proveedor
     * @return void
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Proveedor $proveedor)
    {
        $this->authorize('admin.proveedor.show', $proveedor);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Proveedor $proveedor
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Proveedor $proveedor)
    {
        $this->authorize('admin.proveedor.edit', $proveedor);

        return view('admin.proveedor.edit', [
            'proveedor' => $proveedor,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateProveedor $request
     * @param  Proveedor $proveedor
     * @return Response|array
     */
    public function update(UpdateProveedor $request, Proveedor $proveedor)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Update changed values Proveedor
        $proveedor->update($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/proveedors'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/proveedors');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  DestroyProveedor $request
     * @param  Proveedor $proveedor
     * @return Response|bool
     * @throws \Exception
     */
    public function destroy(DestroyProveedor $request, Proveedor $proveedor)
    {
        $proveedor->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    }
