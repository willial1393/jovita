<?php namespace App\Http\Requests\Admin\Detalleventum;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

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
            'cantidad' => ['nullable', 'integer'],
            'estado' => ['nullable', 'string'],
            'facturaVenta_id' => ['required', 'integer'],
            'PrecioUnidad' => ['nullable', 'integer'],
            'producto_codigo' => ['required', 'integer'],
            'totalVenta' => ['nullable', 'integer'],
            
        ];
    }
}
