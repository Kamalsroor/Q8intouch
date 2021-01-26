<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUser extends FormRequest
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
            'name'              => 'sometimes|nullable|string',
            'username'          => 'required|string',
            'email'            => 'required|email|unique:users,id,'.$this->id,
            'phone_number'      => 'required|unique:users,id,'.$this->id,

            'password'         => 'sometimes|nullable|min:6',
            'password_confirm' => 'required_with:password|same:password',


            'civil_id'          => 'sometimes|nullable|string',
            'stop_number'       => 'sometimes|nullable|string',
            'nationality'       => 'sometimes|nullable|string',
            'gender'            => 'sometimes|nullable|string|in:male,female',
            'social_status'     => 'sometimes|nullable|string|in:single,married',

            'age'               => 'sometimes|nullable|numeric',
            'diets_before'      => 'sometimes|nullable|string',
            'height'            => 'sometimes|nullable|numeric',
            'current_weight'    => 'sometimes|nullable|string',
            'physical_activity' => 'sometimes|nullable|string',
            'medications'       => 'sometimes|nullable|string',
            'water_intake'      => 'sometimes|nullable|string',
            'appetite'          => 'sometimes|nullable|string|in:good,very_good',
            'sleep'             => 'sometimes|nullable|string',


        ];
    }
}
