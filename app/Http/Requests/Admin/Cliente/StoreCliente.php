<?php namespace App\Http\Requests\Admin\Cliente;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreCliente extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
        return Gate::allows('admin.cliente.create');
    }

/**
     * Get the validation rules that apply to the request.
     *
     * @return  array
     */
    public function rules()
    {
        return [
            'documento' => ['required', Rule::unique('cliente', 'documento'), 'string'],
            'tipoDocumento' => ['nullable', 'string'],
            'nombre' => ['nullable', 'string'],
            'telefono' => ['nullable', 'string'],
            'correo' => ['nullable', 'string'],
            
        ];
    }
}
