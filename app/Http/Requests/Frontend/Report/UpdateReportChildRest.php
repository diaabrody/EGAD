<?php

namespace App\Http\Requests\Frontend\Report;

use Illuminate\Foundation\Http\FormRequest;

class UpdateReportChildRest extends FormRequest
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


    public function messages()
    {
        return [
            'gender.required' => 'من فضلك ادخل النوع',
            'reporter_phone_number.required' => 'من فضلك ادخل رقم موبايل المبلغ',
            'reporter_phone_number.regex' => 'رقم موبايل المبلغ غير صحيح',
            'location.required' =>  "من فضلك ادخل حقل العنوان",


        ];
    }







    public function rules()
    {
        return [

            'gender'=>'required',
            'reporter_phone_number'=>'required|regex:/(01)[0-9]{9}/',
            'location'=>'required'



        ];
    }
}
