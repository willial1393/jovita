<?php namespace App\Http\Requests\Admin\Productoproveedor;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateProductoproveedor extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
        return Gate::allows('admin.productoproveedor.edit', $this->productoproveedor);
    }

/**
     * Get the validation rules that apply to the request.
     *
     * @return  array
     */
    public function rules()
    {
        return [
            'producto_id' => ['sometimes', 'integer'],
            'proveedor_id' => ['sometimes', 'integer'],
            
        ];
    }
}
