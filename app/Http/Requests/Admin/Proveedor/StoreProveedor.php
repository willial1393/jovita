<?php namespace App\Http\Requests\Admin\Proveedor;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreProveedor extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
        return Gate::allows('admin.proveedor.create');
    }

/**
     * Get the validation rules that apply to the request.
     *
     * @return  array
     */
    public function rules()
    {
        return [
            'codigo' => ['required', Rule::unique('proveedor', 'codigo'), 'integer'],
            'empresa' => ['nullable', 'string'],
            'representante' => ['nullable', 'string'],
            'estado' => ['nullable', 'string'],
            
        ];
    }
}
