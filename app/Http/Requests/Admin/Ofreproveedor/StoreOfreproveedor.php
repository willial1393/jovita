<?php namespace App\Http\Requests\Admin\Ofreproveedor;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreOfreproveedor extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
        return Gate::allows('admin.ofreproveedor.create');
    }

/**
     * Get the validation rules that apply to the request.
     *
     * @return  array
     */
    public function rules()
    {
        return [
            'identificacion' => ['required', Rule::unique('ofreproveedor', 'identificacion'), 'integer'],
            'descuento' => ['nullable', 'integer'],
            'estado' => ['nullable', 'string'],
            'unidad' => ['nullable', 'string'],
            'precio' => ['nullable', 'integer'],
            'proveedor_id' => ['required', 'integer'],
            'insumo_id' => ['required', 'integer'],
            
        ];
    }
}
