<?php

namespace App\Http\Requests\Backend\Report;

use Illuminate\Foundation\Http\FormRequest;

class StoreReportRequest extends FormRequest
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
    {
        return [
            'name' => 'min:3',
            'reporter_phone_number'=>'required|regex:/(01)[0-9]{9}/',
            'gender'=>'required',
            'photo'=>'mimes:jpeg,png',
            'type'=> 'required',
            'last_seen_at'=>'required',
            'city'=>'required',
            'area'=>'required',
        ];
    }
}
