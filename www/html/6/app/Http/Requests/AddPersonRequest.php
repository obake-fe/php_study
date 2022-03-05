<?php

namespace App\Http\Requests;

use App\Models\Person;
use Illuminate\Foundation\Http\FormRequest;

class AddPersonRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->path() === 'person/add';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return Person::$validate_rules;
    }

    public function messages(): array
    {
        return [
            'name.required' => '名前は必ず入力してください',
            'name.max' => '名前は5文字以下で入力してください'
        ];
    }
}
