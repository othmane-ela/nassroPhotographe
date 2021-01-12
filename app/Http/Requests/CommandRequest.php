<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommandRequest extends FormRequest
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
        $emailValidation = auth()->user() ? 'required|email' : 'required|email|unique:users';
        return [
            'email' =>$emailValidation,
            'name' => 'required|max:30',
            'phone'=> 'required|regex:/(06)[0-9]{8}/',
            'adresse' => 'required|max:255',
            'city' => 'required|max:30',
            'province' => 'required|max:30',
            'code' => 'required|max:5',
            'delivery' => 'required'
        ];
    }
}
