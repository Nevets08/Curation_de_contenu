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
            'nom' => 'string | sometimes|required',
            'description' => 'string | nullable',
            'prive' => 'boolean | sometimes|required',
            'icone' => 'nullable|mimes:jpeg,png,jpg|max:1024', //1MB max
            'user_id' => 'sometimes|required | exists:users,id', //Relation un à plusieurs
            'user.*' => 'sometimes|required | exists:users,id', //Relation plusieurs à plusieurs

            //Gestion des utilisateurs
            'userToUpdate' => 'sometimes|required | exists:tableau_user,user_id',
            'contributeur' => 'sometimes|required | boolean',
            'quit' => 'sometimes|required | boolean',

            //S'abonner
            'abonne' => 'sometimes|required | exists:users,id',
            'sabonner' => 'sometimes|required | boolean'
        ];
    }
}
