<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Cliente\DestroyCliente;
use App\Http\Requests\Admin\Cliente\IndexCliente;
use App\Http\Requests\Admin\Cliente\StoreCliente;
use App\Http\Requests\Admin\Cliente\UpdateCliente;
use App\Models\Cliente;
use App\Models\TipoDocumentos;
use Brackets\AdminListing\Facades\AdminListing;
use Illuminate\Http\Response;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param IndexCliente $request
     * @return Response|array
     */
    public function index(IndexCliente $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Cliente::class)->processRequestAndGet(
        // pass the request with params
            $request,

            // set columns to query
            ['id', 'documento', 'tipoDocumento', 'nombre', 'telefono', 'correo'],

            // set columns to searchIn
            ['id', 'documento', 'tipoDocumento', 'nombre', 'telefono', 'correo']
        );

        if ($request->ajax()) {
            return ['data' => $data];
        }

        return view('admin.cliente.index', ['data' => $data]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $cliente = new Cliente();
        $documentos = TipoDocumentos::all();
        $cliente->tipoDocumento = $documentos->first()->type;
        $this->authorize('admin.cliente.create');

        return view('admin.cliente.create')
            ->with('cliente', $cliente)
            ->with('documentos', $documentos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCliente $request
     * @return Response|array
     */
    public function store(StoreCliente $request)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Store the Cliente
        $cliente = Cliente::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/clientes'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/clientes');
    }

    /**
     * Display the specified resource.
     *
     * @param Cliente $cliente
     * @return void
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Cliente $cliente)
    {
        $this->authorize('admin.cliente.show', $cliente);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Cliente $cliente
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Cliente $cliente)
    {
        $this->authorize('admin.cliente.edit', $cliente);

        return view('admin.cliente.edit', [
            'cliente' => $cliente,
        ])->with('documentos', TipoDocumentos::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCliente $request
     * @param Cliente $cliente
     * @return Response|array
     */
    public function update(UpdateCliente $request, Cliente $cliente)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Update changed values Cliente
        $cliente->update($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/clientes'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/clientes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyCliente $request
     * @param Cliente $cliente
     * @return Response|bool
     * @throws \Exception
     */
    public function destroy(DestroyCliente $request, Cliente $cliente)
    {
        $cliente->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

}
