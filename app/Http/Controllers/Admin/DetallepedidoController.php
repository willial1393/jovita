<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Detallepedido\DestroyDetallepedido;
use App\Http\Requests\Admin\Detallepedido\IndexDetallepedido;
use App\Http\Requests\Admin\Detallepedido\StoreDetallepedido;
use App\Http\Requests\Admin\Detallepedido\UpdateDetallepedido;
use App\Models\Detallepedido;
use App\Models\EstadoDetallePedido;
use App\Models\Pedido;
use App\Models\Producto;
use Illuminate\Http\Response;
use Illuminate\Pagination\LengthAwarePaginator;

class DetallepedidoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexDetallepedido $request
     * @return Response|array
     */
    public function index(IndexDetallepedido $request)
    {
        $detallePedido = Detallepedido::with('pedido')
            ->with('producto')
            ->get();

        if ($request->has('search')) {
            $pedido = Pedido::where('numeroPedido', 'like', '%' . $request->search . '%')->first();
            $detallePedido = $detallePedido->where('pedido_id', $pedido->id)->all();
        }
        $paginator = new LengthAwarePaginator($detallePedido, count($detallePedido), 10, 1);


        if ($request->ajax()) {
            return ['data' => $paginator];
        }

        return view('admin.detallepedido.index', ['data' => $paginator]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $detallepedido = new Detallepedido();
        $detallepedido->pedido_id = Pedido::all()->first()->id;
        $detallepedido->producto_codigo = Producto::all()->first()->id;
        $detallepedido->estado = EstadoDetallePedido::all()->first()->name;
        $this->authorize('admin.detallepedido.create');

        return view('admin.detallepedido.create')
            ->with('pedidos', Pedido::all())
            ->with('estados', EstadoDetallePedido::all())
            ->with('detallepedido', $detallepedido)
            ->with('productos', Producto::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreDetallepedido $request
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
     * @param Detallepedido $detallepedido
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
     * @param Detallepedido $detallepedido
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Detallepedido $detallepedido)
    {
        $this->authorize('admin.detallepedido.edit', $detallepedido);

        return view('admin.detallepedido.edit', [
            'detallepedido' => $detallepedido,
        ])->with('pedidos', Pedido::all())
            ->with('estados', EstadoDetallePedido::all())
            ->with('productos', Producto::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateDetallepedido $request
     * @param Detallepedido $detallepedido
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
     * @param DestroyDetallepedido $request
     * @param Detallepedido $detallepedido
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
