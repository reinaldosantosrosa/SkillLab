<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutoRequest extends FormRequest
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
            'nome' => 'required|max:60',
            'descricao' => 'required|max:255',
        ];
    }


    public function mensagens()
    {
        return [
            'nome.required' => 'O campo nome é requerido',
            'descricao.required' => 'O campo sobrenome é requerido',
            'nome.max' => 'O tamanho do nome inserido no campo não pode utltrapassar 45 caracteres',
            'descricao.max' => 'O tamanho do nome inserido no campo não pode utltrapassar 45 caracteres',
         ];
    
    }
}
