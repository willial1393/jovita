<?php namespace App\Http\Requests\Admin\Proveedor;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateProveedor extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
        return Gate::allows('admin.proveedor.edit', $this->proveedor);
    }

/**
     * Get the validation rules that apply to the request.
     *
     * @return  array
     */
    public function rules()
    {
        return [
            'codigo' => ['sometimes', Rule::unique('proveedor', 'codigo')->ignore($this->proveedor->getKey(), $this->proveedor->getKeyName()), 'integer'],
            'empresa' => ['nullable', 'string'],
            'representante' => ['nullable', 'string'],
            'estado' => ['nullable', 'string'],
            
        ];
    }
}
