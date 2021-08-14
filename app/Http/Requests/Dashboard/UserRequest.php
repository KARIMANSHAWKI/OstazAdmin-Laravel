<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;
use Carpon;

class UserRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    
    public function rules()
    {
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'age' => 'required',
            'phone' => 'required|min:7',
            'gender'=> 'required|in:Male,Female',
            'categories' => 'required',
            'programs' => 'required',



        ];
    }
}
