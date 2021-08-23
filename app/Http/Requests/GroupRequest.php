<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GroupRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'POST':
                return [
                    'name' => "string|min:4|max:32|unique:groups,name",
                ];
                break;

            case 'PATCH':
            case 'PUT':
                return [
                    'name' => "string|min:4|max:32|unique:groups,name,{$this->id}",
                ];
                break;
        }
    }
}
