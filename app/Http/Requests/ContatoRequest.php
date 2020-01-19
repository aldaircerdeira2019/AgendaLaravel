<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContatoRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nome'=> 'required|min:3|max:60',
            'telefone' => 'required|max:15',
            'email' => 'email|max:100',
            'data_nas' => 'date_format:"d/m/Y"',
            'avatar' => 'nullable|sometimes|image|mimes:jpg,jpeg,png,gif'
        ];
    }
}
