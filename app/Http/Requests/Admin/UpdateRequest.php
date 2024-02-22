<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth('admin')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title'=>['required','string'],
            'preview'=>['required','string'],
            'description'=>['required','string'],
            'thumbnail'=>['image'],
        ];
    }


    public function messages()
    {
        return [
            'title' =>'Ошибка ввода',
            'preview' =>'Ошибка ввода',
            'description' =>'Ошибка ввода',
            'thumbnail' =>'Ошибка ввода',
        ];
    }
}
