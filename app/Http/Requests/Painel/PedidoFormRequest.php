<?php

namespace App\Http\Requests\Painel;

use Illuminate\Foundation\Http\FormRequest;

class PedidoFormRequest extends FormRequest
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
            //'cliente' => 'required|min:3|max:100',
            'data_pedido' => 'required|date',
        ];

    }

    public function messages()
    {
        return [
            //'cliente.required' => 'Nome de preenchimento obrigatório',
            //'cliente.min' => 'Nome com min de 3 caracteres e max de 100',
            'data_pedido.required' => 'Preencher Data de Pedido',
        ];

    }
}
