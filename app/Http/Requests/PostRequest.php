<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
        return [
            'title' => 'required',
            'description' => 'required',
            'url' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'O Título é obrigatório!',
            'description.required' => 'A descrição é obrigatória!',
            'url.required' => 'A url da imagem é obrigatória!'
        ];
    }
}
