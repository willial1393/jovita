<?php namespace App\Http\Requests\Admin\Detallepedido;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateDetallepedido extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
        return Gate::allows('admin.detallepedido.edit', $this->detallepedido);
    }

/**
     * Get the validation rules that apply to the request.
     *
     * @return  array
     */
    public function rules()
    {
        return [
            'consecutivo' => ['sometimes', Rule::unique('detallepedido', 'consecutivo')->ignore($this->detallepedido->getKey(), $this->detallepedido->getKeyName()), 'integer'],
            'cantidad' => ['nullable', 'integer'],
            'valorTotal' => ['nullable', 'integer'],
            'estado' => ['nullable', 'string'],
            'pedido_id' => ['sometimes', 'integer'],
            'producto_codigo' => ['sometimes', 'integer'],
            
        ];
    }
}
