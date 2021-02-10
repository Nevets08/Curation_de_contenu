<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TableauRequest extends FormRequest
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
            'nom' => 'string|required',
            'description' => 'string|nullable',
            'prive' => 'boolean|required',
            'icone' => 'nullable|mimes:jpeg,png,jpg|max:1024', //1MB max
            'user_id' => 'required|exists:users,id', //Relation un à plusieurs
            'user.*' => 'nullable|exists:users,id' //Relation plusieurs à plusieurs
        ];
    }
}
