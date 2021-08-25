<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class StudentRequest extends FormRequest
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
        $data =[
            'first_name'=>"required|string|min:4|max:24",
            'last_name'=>"required|string|min:4|max:8",
            'gender'=>['required', Rule::in(['male', 'female', 'other'])],
            'birth_date'=>"required|date",
            'present_address'=>"required|string|min:4|max:124",
            'sms_no'=>"required|string|digits:8",
            'session_year'=>"required|string|min:4|max:8",
            'year'=>"required|string|min:4|max:8",
            'class_id'=>"required|numeric",
            'group_id'=>"required|numeric",
            'section_id'=>"required|numeric",
        ];
        switch ($this->method()) {
            case 'POST':
                $roll = [
                    'roll'=>"required|numeric|unique:students,roll",
                ];
                return array_merge($data, $roll);
                break;

            case 'PATCH':
            case 'PUT':
                $roll = [
                    'roll'=>"required|numeric|unique:students,roll,{$this->id}",
                ];
                return array_merge($data, $roll);
                break;
        }
    }
}
