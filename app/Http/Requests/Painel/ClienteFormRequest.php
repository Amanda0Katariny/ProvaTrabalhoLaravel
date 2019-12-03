<?php

namespace App\Http\Requests\Painel;

use Illuminate\Foundation\Http\FormRequest;

class ClienteFormRequest extends FormRequest
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
            'nome' => 'required|min:3|max:100',
            'CNPJ' => 'required|numeric|min:13|',
            'data_cadastro' => 'required|date',
        ];
    }
    public function messages()
    {
        return[
            'nome.required' => 'Campo Nome é Obrigatorio',
            'nome.min' => 'Nome: Minimo de 3 caracteres e Maximo de 100',
            'CNPJ.digits' => 'CNPJ: Digite apenas números',
            'CNPJ.required' => 'CNPJ: Campo Obrigatório',
            'data_cadastro.required' => 'Campo Data é Obrigatorio',

        ];
    }
}
