<?php

namespace App\Http\Requests\Item;

use Illuminate\Foundation\Http\FormRequest;

class PackingRequest extends FormRequest
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
            'itemcode' => 'required',
            'description' =>  'required',
            'quantity' =>  'required',
        ];
    }
}
