<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StateCreateRequest extends FormRequest
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
            //
            'stateName' =>  'required|unique:states,state_name',
            'areaCode'  =>  'required|unique:states,area_code',
            'user'      =>  'required'
        ];
    }
}
