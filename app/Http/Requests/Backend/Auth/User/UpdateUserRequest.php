<?php

namespace App\Http\Requests\Backend\Auth\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Auth\User;



/**
 * Class UpdateUserRequest.
 */
class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->isAdmin();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {   $user=$this->route('user');

        return [
            'email' => 'required|email|max:191',
            'first_name'  => 'required|max:191',
            'last_name'  => 'required|max:191',
            'timezone' => 'required|max:191',
            'city' => 'required|string|max:191',
            'area' => 'required|string|max:191',
            'phone_no' => ['required', 'regex:/(01)[0-9]{9}/', Rule::unique('users')->ignore($user->phone_no, 'phone_no')],            
            'roles' => 'required|array',
        ];
    }
}
