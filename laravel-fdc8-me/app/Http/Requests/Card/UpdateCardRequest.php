<?php

namespace App\Http\Requests\Card;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCardRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'id' => 'required',
            'name' => 'required',
            'price' => 'required',
            'qty' => 'required',
            'hp' => 'required',
            'status' => 'required',
            'superType_id' => 'required',
            'subType_id' => 'required',
            'type_id' => 'required',
            'resistance_id' => 'required',
            'weakness_id' => 'required'
        ];
    }
}
