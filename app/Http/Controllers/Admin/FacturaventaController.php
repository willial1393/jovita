<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Facturaventum\DestroyFacturaventum;
use App\Http\Requests\Admin\Facturaventum\IndexFacturaventum;
use App\Http\Requests\Admin\Facturaventum\StoreFacturaventum;
use App\Http\Requests\Admin\Facturaventum\UpdateFacturaventum;
use App\Models\Cliente;
use App\Models\Facturaventum;
use Brackets\AdminAuth\Models\AdminUser;
use Illuminate\Http\Response;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;

class FacturaventaController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexFacturaventum $request
     * @return Response|array
     */
    public function index(IndexFacturaventum $request)
    {
        $prueba = Facturaventum::with('cliente')
            ->with('usuario')
            ->get();

        if ($request->has('search')) {
            $cliente = Cliente::where('documento', 'like', '%' . $request->search . '%')->first();
            $prueba = $prueba->where('cliente_id', $cliente->id)->all();
        }
        $paginator = new LengthAwarePaginator($prueba, count($prueba), 10, 1);


        if ($request->ajax()) {
            return ['data' => $paginator];
        }

        return view('admin.facturaventum.index', ['data' => $paginator]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $facturaventum = new Facturaventum();
        $facturaventum->admin_users_id = Auth::id();
        $this->authorize('admin.facturaventum.create');

        return view('admin.facturaventum.create')
            ->with('facturaventum', $facturaventum)
            ->with('clientes', Cliente::all())
            ->with('usuarios', AdminUser::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreFacturaventum $request
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
     * @param Facturaventum $facturaventum
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
     * @param Facturaventum $facturaventum
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Facturaventum $facturaventum)
    {
        $this->authorize('admin.facturaventum.edit', $facturaventum);

        return view('admin.facturaventum.edit', [
            'facturaventum' => $facturaventum,
        ])->with('clientes', Cliente::all())
            ->with('usuarios', AdminUser::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateFacturaventum $request
     * @param Facturaventum $facturaventum
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
     * @param DestroyFacturaventum $request
     * @param Facturaventum $facturaventum
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
