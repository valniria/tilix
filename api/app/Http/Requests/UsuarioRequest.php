<?php

namespace serve\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nome' => 'required|min:3|max:50',
            'email' => 'required|min:3|max:50',
            'envolvimento' => 'required|min:3|max:50',
            'cpf' => 'required|size:14',
        ];
    }
}
