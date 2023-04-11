<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required|min:5',
            'message' => 'required|max:100'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Поле "Имя" обязательное для ввода',
            'email.required' => 'Поле "email" обязательное для ввода',
            'email.email' => 'В поле "email" - не адрес электронной почты',
            'subject.required' => 'Поле "Тема" обязательное для ввода',
            'subject.min' => 'Минимальная длина поля "Тема" не менее 5 символов',
            'message.required' => 'Поле "Сообщение" обязательное для ввода',
            'message.max' => 'Максимальная длина поля "Сообщение" не более 20 символов'
        ];
    }
}
