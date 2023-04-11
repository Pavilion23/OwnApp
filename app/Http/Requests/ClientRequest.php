<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
            'client'      => 'required|min:15',
            'adres'       => 'required',
            'edrpou'      => 'required',
            'nomer_pdv'   => 'max:15',
            'statut_fond' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'client.required' => 'Поле "Наименование клиента" обязательно для ввода',
            'client.min' => 'Длинна "Наименования клиента" не может быть менше 15',
            'adres.required' => 'Поле "Адрес" обязательно для ввода',
            'edrpou.required' => 'Поле "Код ЕДРПОУ" обязательно для ввода',
            'nomer_pdv.max' => 'Количество символов не может быть больше 15',
            'statut_fond.required' => 'Поле "Уставной капитал" обязательно для ввода'
        ];
    }
}
