<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Detallepedido\DestroyDetallepedido;
use App\Http\Requests\Admin\Detallepedido\IndexDetallepedido;
use App\Http\Requests\Admin\Detallepedido\StoreDetallepedido;
use App\Http\Requests\Admin\Detallepedido\UpdateDetallepedido;
use App\Models\Detallepedido;
use Brackets\AdminListing\Facades\AdminListing;
use Illuminate\Http\Response;

class DetallepedidoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param  IndexDetallepedido $request
     * @return Response|array
     */
    public function index(IndexDetallepedido $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Detallepedido::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['cantidad', 'estado', 'id', 'pedido_id', 'producto_codigo', 'valorTotal'],

            // set columns to searchIn
            ['estado', 'id']
        );

        if ($request->ajax()) {
            return ['data' => $data];
        }

        return view('admin.detallepedido.index', ['data' => $data]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('admin.detallepedido.create');

        return view('admin.detallepedido.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreDetallepedido $request
     * @return Response|array
     */
    public function store(StoreDetallepedido $request)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Store the Detallepedido
        $detallepedido = Detallepedido::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/detallepedidos'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/detallepedidos');
    }

    /**
     * Display the specified resource.
     *
     * @param  Detallepedido $detallepedido
     * @return void
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Detallepedido $detallepedido)
    {
        $this->authorize('admin.detallepedido.show', $detallepedido);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Detallepedido $detallepedido
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Detallepedido $detallepedido)
    {
        $this->authorize('admin.detallepedido.edit', $detallepedido);

        return view('admin.detallepedido.edit', [
            'detallepedido' => $detallepedido,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateDetallepedido $request
     * @param  Detallepedido $detallepedido
     * @return Response|array
     */
    public function update(UpdateDetallepedido $request, Detallepedido $detallepedido)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Update changed values Detallepedido
        $detallepedido->update($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/detallepedidos'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/detallepedidos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  DestroyDetallepedido $request
     * @param  Detallepedido $detallepedido
     * @return Response|bool
     * @throws \Exception
     */
    public function destroy(DestroyDetallepedido $request, Detallepedido $detallepedido)
    {
        $detallepedido->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    }
