<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Ofreproveedor\DestroyOfreproveedor;
use App\Http\Requests\Admin\Ofreproveedor\IndexOfreproveedor;
use App\Http\Requests\Admin\Ofreproveedor\StoreOfreproveedor;
use App\Http\Requests\Admin\Ofreproveedor\UpdateOfreproveedor;
use App\Models\Ofreproveedor;
use Brackets\AdminListing\Facades\AdminListing;
use Illuminate\Http\Response;

class OfreproveedorController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param  IndexOfreproveedor $request
     * @return Response|array
     */
    public function index(IndexOfreproveedor $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Ofreproveedor::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['descuento', 'estado', 'id', 'identificacion', 'insumo_id', 'precio', 'proveedor_id', 'unidad'],

            // set columns to searchIn
            ['estado', 'id', 'unidad']
        );

        if ($request->ajax()) {
            return ['data' => $data];
        }

        return view('admin.ofreproveedor.index', ['data' => $data]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('admin.ofreproveedor.create');

        return view('admin.ofreproveedor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreOfreproveedor $request
     * @return Response|array
     */
    public function store(StoreOfreproveedor $request)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Store the Ofreproveedor
        $ofreproveedor = Ofreproveedor::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/ofreproveedors'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/ofreproveedors');
    }

    /**
     * Display the specified resource.
     *
     * @param  Ofreproveedor $ofreproveedor
     * @return void
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Ofreproveedor $ofreproveedor)
    {
        $this->authorize('admin.ofreproveedor.show', $ofreproveedor);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Ofreproveedor $ofreproveedor
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Ofreproveedor $ofreproveedor)
    {
        $this->authorize('admin.ofreproveedor.edit', $ofreproveedor);

        return view('admin.ofreproveedor.edit', [
            'ofreproveedor' => $ofreproveedor,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateOfreproveedor $request
     * @param  Ofreproveedor $ofreproveedor
     * @return Response|array
     */
    public function update(UpdateOfreproveedor $request, Ofreproveedor $ofreproveedor)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Update changed values Ofreproveedor
        $ofreproveedor->update($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/ofreproveedors'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/ofreproveedors');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  DestroyOfreproveedor $request
     * @param  Ofreproveedor $ofreproveedor
     * @return Response|bool
     * @throws \Exception
     */
    public function destroy(DestroyOfreproveedor $request, Ofreproveedor $ofreproveedor)
    {
        $ofreproveedor->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    }
