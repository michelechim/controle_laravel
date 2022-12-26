<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EstoqueRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'qtd_estoque'=> 'required | min:1 | numeric '
        ];
    }

    public function message(){
        return [
            'qtd_estoque'=>'Insira ao menos um registro no estoque!'
        ];
    }
}
