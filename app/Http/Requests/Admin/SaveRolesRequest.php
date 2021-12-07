<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class SaveRolesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // forma de autorizar sin necesidad de utilizar el $this->autorize en el controlador
        //return Gate::authorize('update', $this->route('role'));
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = array(
            'display_name' => 'required',
            'guard_name' => 'required'
        );

        if ( $this->method() === 'POST' )
        {
            $rules['name'] = ['required','unique:roles'];
        }

        return  $rules;

    }

    public function messages()
    {
        return [
            'name.required' => 'El identificador es obligatorio',
            'name.unique' => 'El identificador ya existe en la base de datos',
            'display_name.required' => 'El campo Nombre es obligatorio'
        ];
    }
}
