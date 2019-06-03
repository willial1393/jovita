<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Detalleventum\DestroyDetalleventum;
use App\Http\Requests\Admin\Detalleventum\IndexDetalleventum;
use App\Http\Requests\Admin\Detalleventum\StoreDetalleventum;
use App\Http\Requests\Admin\Detalleventum\UpdateDetalleventum;
use App\Models\Detalleventum;
use Brackets\AdminListing\Facades\AdminListing;
use Illuminate\Http\Response;

class DetalleventaController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param  IndexDetalleventum $request
     * @return Response|array
     */
    public function index(IndexDetalleventum $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Detalleventum::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['cantidad', 'estado', 'facturaVenta_id', 'id', 'PrecioUnidad', 'producto_codigo', 'totalVenta'],

            // set columns to searchIn
            ['estado', 'id']
        );

        if ($request->ajax()) {
            return ['data' => $data];
        }

        return view('admin.detalleventum.index', ['data' => $data]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('admin.detalleventum.create');

        return view('admin.detalleventum.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreDetalleventum $request
     * @return Response|array
     */
    public function store(StoreDetalleventum $request)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Store the Detalleventum
        $detalleventum = Detalleventum::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/detalleventa'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/detalleventa');
    }

    /**
     * Display the specified resource.
     *
     * @param  Detalleventum $detalleventum
     * @return void
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Detalleventum $detalleventum)
    {
        $this->authorize('admin.detalleventum.show', $detalleventum);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Detalleventum $detalleventum
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Detalleventum $detalleventum)
    {
        $this->authorize('admin.detalleventum.edit', $detalleventum);

        return view('admin.detalleventum.edit', [
            'detalleventum' => $detalleventum,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateDetalleventum $request
     * @param  Detalleventum $detalleventum
     * @return Response|array
     */
    public function update(UpdateDetalleventum $request, Detalleventum $detalleventum)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Update changed values Detalleventum
        $detalleventum->update($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/detalleventa'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/detalleventa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  DestroyDetalleventum $request
     * @param  Detalleventum $detalleventum
     * @return Response|bool
     * @throws \Exception
     */
    public function destroy(DestroyDetalleventum $request, Detalleventum $detalleventum)
    {
        $detalleventum->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    }
