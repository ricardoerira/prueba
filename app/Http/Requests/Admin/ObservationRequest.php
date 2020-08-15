<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ObservationRequest extends FormRequest
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
            "observation"   => 'required|min:20|max:300',
            "call"          => 'required',
            "email"          => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'observation'   => 'Observación General',
            'call'          => 'Se realizo llamada',
            'email'         => 'Se envió correo',
        ];
    }

}
