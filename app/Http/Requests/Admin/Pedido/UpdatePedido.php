<?php namespace App\Http\Requests\Admin\Pedido;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdatePedido extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
        return Gate::allows('admin.pedido.edit', $this->pedido);
    }

/**
     * Get the validation rules that apply to the request.
     *
     * @return  array
     */
    public function rules()
    {
        return [
            'numeroPedido' => ['sometimes', Rule::unique('pedido', 'numeroPedido')->ignore($this->pedido->getKey(), $this->pedido->getKeyName()), 'integer'],
            'estado' => ['nullable', 'string'],
            'fecha' => ['nullable', 'date'],
            'proveedor_id' => ['sometimes', 'integer'],
            'usuario_id' => ['sometimes', 'integer'],
            
        ];
    }
}
