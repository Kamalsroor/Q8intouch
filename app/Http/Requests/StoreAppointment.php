<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAppointment extends FormRequest
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
            'status'            => 'required|string',
            'name'              => 'required|string',
            'phone_number'      => 'required|unique:users,id,'.$this->user_id,
            'civil_id'          => 'required|string',
            'date'              => 'required|date',
            'time'              => 'required|date_format:H:i',
            'user_id'           => 'required',
            'admin_id'           => 'required|exists:admins,id',
        ];
    }
}


