<?php namespace App\Http\Requests\Admin\Detalleventum;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreDetalleventum extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
        return Gate::allows('admin.detalleventum.create');
    }

/**
     * Get the validation rules that apply to the request.
     *
     * @return  array
     */
    public function rules()
    {
        return [
            'consecutivo' => ['required', Rule::unique('detalleventa', 'consecutivo'), 'integer'],
            'totalVenta' => ['nullable', 'integer'],
            'cantidad' => ['nullable', 'integer'],
            'PrecioUnidad' => ['nullable', 'integer'],
            'estado' => ['nullable', 'string'],
            'facturaVenta_id' => ['required', 'integer'],
            'producto_codigo' => ['required', 'integer'],
            
        ];
    }
}
