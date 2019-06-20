<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ListAvailableCategoriesRequest extends FormRequest
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
          "pickup_location"=> 'required',
          "pickup_date"=> 'required',
          "return_location"=> 'required',
          "return_date"=> 'required',
        ];
    }
}
