<?php namespace App\Http\Requests\Admin\Cliente;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateCliente extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
        return Gate::allows('admin.cliente.edit', $this->cliente);
    }

/**
     * Get the validation rules that apply to the request.
     *
     * @return  array
     */
    public function rules()
    {
        return [
            'documento' => ['sometimes', Rule::unique('cliente', 'documento')->ignore($this->cliente->getKey(), $this->cliente->getKeyName()), 'string'],
            'tipoDocumento' => ['nullable', 'string'],
            'nombre' => ['nullable', 'string'],
            'telefono' => ['nullable', 'string'],
            'correo' => ['nullable', 'string'],
            
        ];
    }
}
