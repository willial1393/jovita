<?php namespace App\Http\Requests\Admin\Producto;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateProducto extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
        return Gate::allows('admin.producto.edit', $this->producto);
    }

/**
     * Get the validation rules that apply to the request.
     *
     * @return  array
     */
    public function rules()
    {
        return [
            'codigo' => ['sometimes', Rule::unique('producto', 'codigo')->ignore($this->producto->getKey(), $this->producto->getKeyName()), 'string'],
            'nombre' => ['nullable', 'string'],
            'unidad' => ['nullable', 'string'],
            'precioP' => ['nullable', 'integer'],
            'estado' => ['nullable', 'string'],
            'existencia' => ['nullable', 'integer'],
            'tipo' => ['sometimes', 'string'],
            
        ];
    }
}
