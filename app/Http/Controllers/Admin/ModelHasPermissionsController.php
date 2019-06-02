<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ModelHasPermission\DestroyModelHasPermission;
use App\Http\Requests\Admin\ModelHasPermission\IndexModelHasPermission;
use App\Http\Requests\Admin\ModelHasPermission\StoreModelHasPermission;
use App\Http\Requests\Admin\ModelHasPermission\UpdateModelHasPermission;
use App\Models\ModelHasPermission;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Response;
use Illuminate\Pagination\LengthAwarePaginator;

class ModelHasPermissionsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexModelHasPermission $request
     * @return Response|array
     */
    public function index(IndexModelHasPermission $request)
    {
        $prueba = ModelHasPermission::with('rol')
            ->with('permiso')
            ->get();

        if ($request->has('search')) {
            $rol = Role::where('name', 'like', '%' . $request->search . '%')->first();
            $prueba = $prueba->where('model_id', $rol->id)->all();
        }
        $paginator = new LengthAwarePaginator($prueba, count($prueba), 10, 1);

        if ($request->ajax()) {
            return ['data' => $paginator];
        }

        return view('admin.model-has-permission.index', ['data' => $paginator]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $modelHasPermission = new ModelHasPermission();
        $modelHasPermission->model_type = 'Brackets\AdminAuth\Models\AdminUser';
        $this->authorize('admin.model-has-permission.create');
        return view('admin.model-has-permission.create')
            ->with('modelHasPermission', $modelHasPermission)
            ->with('roles', Role::get())
            ->with('permisos', Permission::get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreModelHasPermission $request
     * @return Response|array
     */
    public function store(StoreModelHasPermission $request)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Store the ModelHasPermission
        $modelHasPermission = ModelHasPermission::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/model-has-permissions'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/model-has-permissions');
    }

    /**
     * Display the specified resource.
     *
     * @param ModelHasPermission $modelHasPermission
     * @return void
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(ModelHasPermission $modelHasPermission)
    {
        $this->authorize('admin.model-has-permission.show', $modelHasPermission);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ModelHasPermission $modelHasPermission
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(ModelHasPermission $modelHasPermission)
    {
        $this->authorize('admin.model-has-permission.edit', $modelHasPermission);

        return view('admin.model-has-permission.edit', [
            'modelHasPermission' => $modelHasPermission,
            'roles' => Role::get(),
            'permisos' => Permission::get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateModelHasPermission $request
     * @param ModelHasPermission $modelHasPermission
     * @return Response|array
     */
    public function update(UpdateModelHasPermission $request, ModelHasPermission $modelHasPermission)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Update changed values ModelHasPermission
        $modelHasPermission->update($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/model-has-permissions'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/model-has-permissions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyModelHasPermission $request
     * @param ModelHasPermission $modelHasPermission
     * @return Response|bool
     * @throws \Exception
     */
    public function destroy(DestroyModelHasPermission $request, ModelHasPermission $modelHasPermission)
    {
        $modelHasPermission->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

}
