<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttendanceFormRequest extends FormRequest
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
            'title' => 'required|unique:classes|max:255',
            'title' => array('Regex:/^[A-Za-z0-9 ]+$/'),
            'teacher_id' => 'required',
            'teacher_id' => array('Regex:/^[0-9 ]+$/'),
        ];
    }
}
