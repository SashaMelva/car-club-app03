<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules() {
        return [
            'name' => 'required|unique:posts|max:255',
            'surname' => 'required|max:255',
            'patronymic' => 'max:255',
            'phone' => 'required|max:255'
        ];
    }

    public function messages() {
        return [
            'name.required' => 'Поле имя является обязательным для заполнения',
            'surname.required' => 'Поле фамилия является обязательным для заполнения',
            'phone.required' => 'Поле телефон является обязательным для заполнения',
            
        ];
    }
}
