<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\Admin\Pedido\IndexPedido;
use App\Http\Requests\Admin\Pedido\StorePedido;
use App\Http\Requests\Admin\Pedido\UpdatePedido;
use App\Http\Requests\Admin\Pedido\DestroyPedido;
use Brackets\AdminListing\Facades\AdminListing;
use App\Models\Pedido;

class PedidoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param  IndexPedido $request
     * @return Response|array
     */
    public function index(IndexPedido $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Pedido::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'numeroPedido', 'estado', 'fecha', 'proveedor_id', 'usuario_id'],

            // set columns to searchIn
            ['id', 'estado']
        );

        if ($request->ajax()) {
            return ['data' => $data];
        }

        return view('admin.pedido.index', ['data' => $data]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('admin.pedido.create');

        return view('admin.pedido.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StorePedido $request
     * @return Response|array
     */
    public function store(StorePedido $request)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Store the Pedido
        $pedido = Pedido::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/pedidos'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/pedidos');
    }

    /**
     * Display the specified resource.
     *
     * @param  Pedido $pedido
     * @return void
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Pedido $pedido)
    {
        $this->authorize('admin.pedido.show', $pedido);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Pedido $pedido
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Pedido $pedido)
    {
        $this->authorize('admin.pedido.edit', $pedido);

        return view('admin.pedido.edit', [
            'pedido' => $pedido,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdatePedido $request
     * @param  Pedido $pedido
     * @return Response|array
     */
    public function update(UpdatePedido $request, Pedido $pedido)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Update changed values Pedido
        $pedido->update($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/pedidos'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/pedidos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  DestroyPedido $request
     * @param  Pedido $pedido
     * @return Response|bool
     * @throws \Exception
     */
    public function destroy(DestroyPedido $request, Pedido $pedido)
    {
        $pedido->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    }
