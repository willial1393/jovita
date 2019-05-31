<?php namespace App\Http\Requests\Admin\Pedido;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StorePedido extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
        return Gate::allows('admin.pedido.create');
    }

/**
     * Get the validation rules that apply to the request.
     *
     * @return  array
     */
    public function rules()
    {
        return [
            'numeroPedido' => ['required', Rule::unique('pedido', 'numeroPedido'), 'integer'],
            'estado' => ['nullable', 'string'],
            'fecha' => ['nullable', 'date'],
            'proveedor_id' => ['required', 'integer'],
            'usuario_id' => ['required', 'integer'],
            
        ];
    }
}
