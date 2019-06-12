<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Detalleventum\DestroyDetalleventum;
use App\Http\Requests\Admin\Detalleventum\IndexDetalleventum;
use App\Http\Requests\Admin\Detalleventum\StoreDetalleventum;
use App\Http\Requests\Admin\Detalleventum\UpdateDetalleventum;
use App\Models\Detalleventum;
use App\Models\EstadoDetalleFactura;
use App\Models\Facturaventum;
use App\Models\Producto;
use Illuminate\Http\Response;
use Illuminate\Pagination\LengthAwarePaginator;

class DetalleventaController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexDetalleventum $request
     * @return Response|array
     */
    public function index(IndexDetalleventum $request)
    {
        $detalleFactura = Detalleventum::with('factura')
            ->with('producto')
            ->get();

        if ($request->has('search')) {
            $factura = Facturaventum::where('numero', 'like', '%' . $request->search . '%')->first();
            $detalleFactura = $detalleFactura->where('facturaVenta_id', $factura->id)->all();
        }
        $paginator = new LengthAwarePaginator($detalleFactura, count($detalleFactura), 10, 1);


        if ($request->ajax()) {
            return ['data' => $paginator];
        }

        return view('admin.detalleventum.index', ['data' => $paginator]);

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

        $detalleventum = new Detalleventum();
        $detalleventum->facturaVenta_id = Facturaventum::all()->first()->id;
        $detalleventum->producto_codigo = Producto::all()->first()->id;
        $detalleventum->estado = EstadoDetalleFactura::all()->first()->name;
        return view('admin.detalleventum.create')
            ->with('facturas', Facturaventum::all())
            ->with('detalleventum', $detalleventum)
            ->with('estados', EstadoDetalleFactura::all())
            ->with('productos', Producto::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreDetalleventum $request
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
     * @param Detalleventum $detalleventum
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
     * @param Detalleventum $detalleventum
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Detalleventum $detalleventum)
    {
        $this->authorize('admin.detalleventum.edit', $detalleventum);

        return view('admin.detalleventum.edit', [
            'detalleventum' => $detalleventum,
        ])->with('facturas', Facturaventum::all())
            ->with('estados', EstadoDetalleFactura::all())
            ->with('productos', Producto::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateDetalleventum $request
     * @param Detalleventum $detalleventum
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
     * @param DestroyDetalleventum $request
     * @param Detalleventum $detalleventum
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
