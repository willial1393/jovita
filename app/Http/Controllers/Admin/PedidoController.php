<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Pedido\DestroyPedido;
use App\Http\Requests\Admin\Pedido\IndexPedido;
use App\Http\Requests\Admin\Pedido\StorePedido;
use App\Http\Requests\Admin\Pedido\UpdatePedido;
use App\Models\Pedido;
use App\Models\Proveedor;
use Brackets\AdminAuth\Models\AdminUser;
use Illuminate\Http\Response;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;

class PedidoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexPedido $request
     * @return Response|array
     */
    public function index(IndexPedido $request)
    {
        $pedido = Pedido::with('usuario')
            ->with('proveedor')
            ->get();

        if ($request->has('search')) {
            $proveedor = Proveedor::where('empresa', 'like', '%' . $request->search . '%')->first();
            $pedido = $pedido->where('proveedor_id', $proveedor->id)->all();
        }
        $paginator = new LengthAwarePaginator($pedido, count($pedido), 10, 1);

        if ($request->ajax()) {
            return ['data' => $paginator];
        }

        return view('admin.pedido.index', ['data' => $paginator]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $pedido = new Pedido();
        $pedido->admin_users_id = Auth::id();
        $this->authorize('admin.pedido.create');

        return view('admin.pedido.create')
            ->with('pedido', $pedido)
            ->with('usuarios', AdminUser::get())
            ->with('proveedores', Proveedor::get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePedido $request
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
     * @param Pedido $pedido
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
     * @param Pedido $pedido
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Pedido $pedido)
    {
        $this->authorize('admin.pedido.edit', $pedido);

        return view('admin.pedido.edit', [
            'pedido' => $pedido,
        ])->with('usuarios', AdminUser::get())
            ->with('proveedores', Proveedor::get());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePedido $request
     * @param Pedido $pedido
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
     * @param DestroyPedido $request
     * @param Pedido $pedido
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
