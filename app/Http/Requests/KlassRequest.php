<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class KlassRequest extends FormRequest
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
                    'name' => "integer|min:6|max:10|unique:klasses,name"
                ];
                break;

            case 'PATCH':
            case 'PUT':
                // dd($this->id);
                return [
                    'name' => "integer|min:6|max:10|unique:klasses,name,{$this->id}"
                    // 'name' => 'required|unique:categories,name,' . $this->category->id,
                    // 'title' => "required|unique:posts,title,{$this->post->id}"
                ];
                break;
        }
    }
}
