<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClassSectionRequest extends FormRequest
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
                    'name' => "string|size:1|unique:class_sections,name"
                ];
                break;

            case 'PATCH':
            case 'PUT':
                return [
                    'name' => "string|size:1|unique:class_sections,name,{$this->id}",
                    'id' => 'integer'
                ];
                break;
        }
    }
}
