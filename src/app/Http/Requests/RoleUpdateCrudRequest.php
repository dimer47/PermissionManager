<?php

namespace Backpack\PermissionManager\app\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleUpdateCrudRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        return backpack_auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name' => 'sometimes|string|max:255',
        ];

        return $rules;
    }
}
