<?php namespace App\Http\Requests\Admin\Detallepedido;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreDetallepedido extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
        return Gate::allows('admin.detallepedido.create');
    }

/**
     * Get the validation rules that apply to the request.
     *
     * @return  array
     */
    public function rules()
    {
        return [
            'cantidad' => ['nullable', 'integer'],
            'estado' => ['nullable', 'string'],
            'pedido_id' => ['required', 'integer'],
            'producto_codigo' => ['required', 'integer'],
            'valorTotal' => ['nullable', 'integer'],
            
        ];
    }
}
