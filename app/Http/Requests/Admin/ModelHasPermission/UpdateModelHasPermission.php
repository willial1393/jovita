<?php namespace App\Http\Requests\Admin\ModelHasPermission;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateModelHasPermission extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
        return Gate::allows('admin.model-has-permission.edit', $this->modelHasPermission);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return  array
     */
    public function rules()
    {
        return [
            'permission_id' => ['sometimes', 'integer'],
            'model_type' => ['sometimes', 'string'],
            'model_id' => ['sometimes', 'integer'],

        ];
    }
}
