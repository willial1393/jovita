<?php namespace App\Http\Requests\Admin\Facturaventum;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreFacturaventum extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
        return Gate::allows('admin.facturaventum.create');
    }

/**
     * Get the validation rules that apply to the request.
     *
     * @return  array
     */
    public function rules()
    {
        return [
            'numero' => ['required', Rule::unique('facturaventa', 'numero'), 'integer'],
            'fecha' => ['nullable', 'date'],
            'estado' => ['nullable', 'string'],
            'cliente_id' => ['required', 'integer'],
            'usuario_id' => ['required', 'integer'],
            
        ];
    }
}
