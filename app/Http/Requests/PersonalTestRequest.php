<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class PersonalTestRequest extends FormRequest
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
        'p_id'=>'required|exists:customers,personal_id',
        'distance'=>'required',
        'Right_eye_degree'=>'required',
        'left_eye_degree'=>'required',
        'year'=>'required|integer|min:2000',
        'month'=>'required|integer|min:1|max:12',
        'day'=>'required|integer|min:1|max:31',
        'report' =>  'required_without:rid|file|mimes:csv,txt,xlx,xls,pdf|max:2048',
        'cost'=>'required|integer',
        'attach'=>'required_without:aid|file||mimes:csv,txt,xlx,xls,pdf|max:2048',
        'test_id'=>'required|exists:test,id',
        ];
    }
}
