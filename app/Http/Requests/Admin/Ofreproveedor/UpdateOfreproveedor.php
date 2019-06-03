<?php namespace App\Http\Requests\Admin\Ofreproveedor;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateOfreproveedor extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
        return Gate::allows('admin.ofreproveedor.edit', $this->ofreproveedor);
    }

/**
     * Get the validation rules that apply to the request.
     *
     * @return  array
     */
    public function rules()
    {
        return [
            'descuento' => ['nullable', 'integer'],
            'estado' => ['nullable', 'string'],
            'identificacion' => ['sometimes', Rule::unique('ofreproveedor', 'identificacion')->ignore($this->ofreproveedor->getKey(), $this->ofreproveedor->getKeyName()), 'integer'],
            'precio' => ['nullable', 'integer'],
            'producto_id' => ['sometimes', 'integer'],
            'proveedor_id' => ['sometimes', 'integer'],
            'unidad' => ['nullable', 'string'],
            
        ];
    }
}
