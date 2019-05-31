<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\Admin\Facturaventum\IndexFacturaventum;
use App\Http\Requests\Admin\Facturaventum\StoreFacturaventum;
use App\Http\Requests\Admin\Facturaventum\UpdateFacturaventum;
use App\Http\Requests\Admin\Facturaventum\DestroyFacturaventum;
use Brackets\AdminListing\Facades\AdminListing;
use App\Models\Facturaventum;

class FacturaventaController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param  IndexFacturaventum $request
     * @return Response|array
     */
    public function index(IndexFacturaventum $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Facturaventum::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'numero', 'fecha', 'estado', 'cliente_id', 'usuario_id'],

            // set columns to searchIn
            ['id', 'estado']
        );

        if ($request->ajax()) {
            return ['data' => $data];
        }

        return view('admin.facturaventum.index', ['data' => $data]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('admin.facturaventum.create');

        return view('admin.facturaventum.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreFacturaventum $request
     * @return Response|array
     */
    public function store(StoreFacturaventum $request)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Store the Facturaventum
        $facturaventum = Facturaventum::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/facturaventa'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/facturaventa');
    }

    /**
     * Display the specified resource.
     *
     * @param  Facturaventum $facturaventum
     * @return void
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Facturaventum $facturaventum)
    {
        $this->authorize('admin.facturaventum.show', $facturaventum);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Facturaventum $facturaventum
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Facturaventum $facturaventum)
    {
        $this->authorize('admin.facturaventum.edit', $facturaventum);

        return view('admin.facturaventum.edit', [
            'facturaventum' => $facturaventum,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateFacturaventum $request
     * @param  Facturaventum $facturaventum
     * @return Response|array
     */
    public function update(UpdateFacturaventum $request, Facturaventum $facturaventum)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Update changed values Facturaventum
        $facturaventum->update($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/facturaventa'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/facturaventa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  DestroyFacturaventum $request
     * @param  Facturaventum $facturaventum
     * @return Response|bool
     * @throws \Exception
     */
    public function destroy(DestroyFacturaventum $request, Facturaventum $facturaventum)
    {
        $facturaventum->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    }
