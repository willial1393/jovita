<?php namespace App\Http\Requests\Admin\Productoproveedor;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

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
            'ofreProveedor_id' => ['sometimes', 'integer'],
            
        ];
    }
}
