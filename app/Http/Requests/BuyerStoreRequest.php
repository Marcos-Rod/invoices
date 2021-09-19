<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BuyerStoreRequest extends FormRequest
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
            'nif' => 'required|max:20',
            'name' => 'required|max:150',
            'email' => 'required|email'
        ];
    }
}
