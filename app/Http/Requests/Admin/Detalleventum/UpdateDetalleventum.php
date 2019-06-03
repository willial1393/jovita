<?php namespace App\Http\Requests\Admin\Detalleventum;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateDetalleventum extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
        return Gate::allows('admin.detalleventum.edit', $this->detalleventum);
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
            'facturaVenta_id' => ['sometimes', 'integer'],
            'PrecioUnidad' => ['nullable', 'integer'],
            'producto_codigo' => ['sometimes', 'integer'],
            'totalVenta' => ['nullable', 'integer'],
            
        ];
    }
}
