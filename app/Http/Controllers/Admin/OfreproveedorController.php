<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Ofreproveedor\DestroyOfreproveedor;
use App\Http\Requests\Admin\Ofreproveedor\IndexOfreproveedor;
use App\Http\Requests\Admin\Ofreproveedor\StoreOfreproveedor;
use App\Http\Requests\Admin\Ofreproveedor\UpdateOfreproveedor;
use App\Models\EstadoOfertaProveedor;
use App\Models\Ofreproveedor;
use App\Models\Producto;
use App\Models\Proveedor;
use Illuminate\Http\Response;
use Illuminate\Pagination\LengthAwarePaginator;

class OfreproveedorController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexOfreproveedor $request
     * @return Response|array
     */
    public function index(IndexOfreproveedor $request)
    {
        $prueba = Ofreproveedor::with('proveedor')
            ->with('producto')
            ->get();

        if ($request->has('search')) {
            $proveedor = Proveedor::where('empresa', 'like', '%' . $request->search . '%')->first();
            $prueba = $prueba->where('proveedor_id', $proveedor->id)->all();
        }
        $paginator = new LengthAwarePaginator($prueba, count($prueba), 10, 1);


        if ($request->ajax()) {
            return ['data' => $paginator];
        }

        return view('admin.ofreproveedor.index', ['data' => $paginator]);

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
        $ofreproveedor = new Ofreproveedor();
        $ofreproveedor->estado = EstadoOfertaProveedor::all()->first()->name;
        $ofreproveedor->proveedor_id = Proveedor::all()->first()->id;
        $ofreproveedor->producto_id = Producto::all()->first()->id;
        return view('admin.ofreproveedor.create')
            ->with('ofreproveedor', $ofreproveedor)
            ->with('proveedores', Proveedor::all())
            ->with('estados', EstadoOfertaProveedor::all())
            ->with('productos', Producto::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreOfreproveedor $request
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
     * @param Ofreproveedor $ofreproveedor
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
     * @param Ofreproveedor $ofreproveedor
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Ofreproveedor $ofreproveedor)
    {
        $this->authorize('admin.ofreproveedor.edit', $ofreproveedor);

        return view('admin.ofreproveedor.edit', [
            'ofreproveedor' => $ofreproveedor,
        ])->with('proveedores', Proveedor::all())
            ->with('estados', EstadoOfertaProveedor::all())
            ->with('productos', Producto::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateOfreproveedor $request
     * @param Ofreproveedor $ofreproveedor
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
     * @param DestroyOfreproveedor $request
     * @param Ofreproveedor $ofreproveedor
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
