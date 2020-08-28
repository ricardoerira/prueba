<?php

namespace App\Http\Requests;

use App\Models\Question;
use Illuminate\Foundation\Http\FormRequest;

class SurveyDoingRequest extends FormRequest
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
        $answers = $this->request->get('answers');
        $rules = [];

        foreach ($answers as $key => $val) {
            $rules['answers.' . $key] = Question::where("id", $key)->first("validation")->validation;
        }

        return $rules;
    }
}
