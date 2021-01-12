<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class MariageRequest extends FormRequest
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
            'packs' => 'required|numeric',
            'email' =>$emailValidation,
            'nom' => 'required|max:30',
            'prenom' => 'required|max:30',
            'phone'=> 'required|regex:/(06)[0-9]{8}/',
            'reservation_date' => 'date|after_or_equal:'.Carbon::now()
        ];
    }
}
