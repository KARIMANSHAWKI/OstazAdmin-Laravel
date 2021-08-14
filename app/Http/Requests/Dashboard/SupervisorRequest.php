<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class SupervisorRequest extends FormRequest
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

    public function rules()
    {
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required|min:7',
            'permissions' => 'required',
            'password' => 'required|min:6|confirmed',
            'email' => ['required',Rule::unique('supervisors')->ignore(auth()->user()->id)],

        ];
    }
}
