<?php

namespace App\Http\Requests\Frontend\Comment;

use Illuminate\Foundation\Http\FormRequest;

class StoreComment extends FormRequest
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
    

    public function messages()
    {
        return [
            'text.required' => 'Please Enter Your Comment',

        ];
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

            'text'=>'required',

        ];
    }
}
