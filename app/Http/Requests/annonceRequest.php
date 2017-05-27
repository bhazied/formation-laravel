<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class annonceRequest extends FormRequest
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
            'category_id' => 'required|exists:categories,id',
            'reference' => 'required|unique:annonces',
            'description' => 'required|min:50'
        ];
    }

    public function messages()
    {
        return [
            //'description.required' => "Le description d'annonce est obligatoire"
        ];
    }

}
