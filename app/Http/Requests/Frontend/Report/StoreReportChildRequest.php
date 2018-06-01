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
            'name.min' => 'اسم المفقود يجب ان لا يقل ثلاثه احرف ',
            'name.max' => 'اسم المفقود يجب ان لا يزيد عن  خمسين  احرف ',
            'name.required' => 'من فضلك ادخل اسم المفقود',
            'gender.required' => 'من فضلك ادخل النوع',
            'reporter_phone_number.required' => 'من فضلك ادخل رقم موبايل المبلغ',
            'reporter_phone_number.regex' => 'رقم موبايل المبلغ غير صحيح',
            'age.required' => 'من فضلك ادخل عمر المفقود',
            'location.required' =>  "من فضلك ادخل حقل اين فقد",


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
            'reporter_phone_number'=>'required|regex:/(01)[0-9]{9}/',
            'name'=>'required|min:3|max:50',
             'age'=>'required',
            'location'=>'required'



        ];
    }
}
