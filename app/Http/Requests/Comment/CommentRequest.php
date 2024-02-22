<?php

namespace App\Http\Requests\Comment;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth('web')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'text' => ['required','string' , 'min:5'],
            'user_id' => ['required', 'exists:users,id']
        ];
    }


    public function messages()
    {
        return [
            'title' =>'Ошибка ввода',
            'user_id' =>'Ошибка ввода',
        ];
    }


    protected function prepareForValidation()
    {
        $this->merge([
            'user_id' => auth('web')->id()
        ]);
    }
}
