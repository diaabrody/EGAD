<?php

namespace App\Http\Requests\Frontend\Auth;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class RegisterRequest.
 */
class UrgentRegisterRequest extends FormRequest
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
            'phone_no'  => ['required', 'regex:/(01)[0-9]{9}/', Rule::unique('users')],
            
        ];
    }

   
}
