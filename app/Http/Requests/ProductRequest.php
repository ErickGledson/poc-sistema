<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'required|min:5|max:60',
            'description' => 'required|min:5|max:254',
            'price' => 'required',
            'category_id' => 'required',
            'image' => 'required',
            'provider_id' => 'required',
            'provider_product_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O nome é requerido',
            'name.min' => 'O tamanho mínimo do nome é de 5 caracteres',
            'name.max' => 'O tamanho máximo do nome é de 60 caracteres',
            'description.required' => 'A descrição é requerido',
            'description.min' => 'O tamanho mínimo da descrição é de 5 caracteres',
            'description.max' => 'O tamanho máximo da descrição é de 254 caracteres',
            'price.required' => 'O valor é requerido',
            'category_id.required' => 'A categoria é requerida',
            'image.required' => 'A imagem é requerida',
            'provider_id.required' => 'O fornecedor é requerido',
            'provider_product_id.required' => 'O ID do produto no fornecedor é requerido',
        ];
    }
}
