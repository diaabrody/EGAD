<?php

namespace App\Http\Requests\Frontend\Report;

use Illuminate\Foundation\Http\FormRequest;

class StoreReportChildRequest extends FormRequest
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
            'photo.required' => 'من فضلك ادخل صوره المفقود',
            'photo.mimes' => 'من فضلك ادخل امتداد jpeg او png للصوره ',
            'gender.required' => 'من فضلك ادخل النوع',
            'location.required' =>  "من فضلك ادخل العنوان",
            'area.required' =>  "من فضلك ادخل الحي",
            'city.required' =>  "من فضلك ادخل المنطقه",
            'reporter_phone_number.regex' => 'برجاء ادخال رقم موبايل صحيح',


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

            'photo'=>'required|mimes:jpeg,png',
            'gender'=>'required',
            'location'=>'required' ,
            'area'=>'required' ,
            'city'=>'required',
      'reporter_phone_number'=>'regex:/(01)[0-9]{9}/'

        ];
    }
}
