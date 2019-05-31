<?php namespace App\Http\Requests\Admin\Detalleventum;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

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
            'consecutivo' => ['sometimes', Rule::unique('detalleventa', 'consecutivo')->ignore($this->detalleventum->getKey(), $this->detalleventum->getKeyName()), 'integer'],
            'totalVenta' => ['nullable', 'integer'],
            'cantidad' => ['nullable', 'integer'],
            'PrecioUnidad' => ['nullable', 'integer'],
            'estado' => ['nullable', 'string'],
            'facturaVenta_id' => ['sometimes', 'integer'],
            'producto_codigo' => ['sometimes', 'integer'],
            
        ];
    }
}
