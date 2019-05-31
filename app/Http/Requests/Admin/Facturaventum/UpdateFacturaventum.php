<?php namespace App\Http\Requests\Admin\Facturaventum;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateFacturaventum extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
        return Gate::allows('admin.facturaventum.edit', $this->facturaventum);
    }

/**
     * Get the validation rules that apply to the request.
     *
     * @return  array
     */
    public function rules()
    {
        return [
            'numero' => ['sometimes', Rule::unique('facturaventa', 'numero')->ignore($this->facturaventum->getKey(), $this->facturaventum->getKeyName()), 'integer'],
            'fecha' => ['nullable', 'date'],
            'estado' => ['nullable', 'string'],
            'cliente_id' => ['sometimes', 'integer'],
            'usuario_id' => ['sometimes', 'integer'],
            
        ];
    }
}
