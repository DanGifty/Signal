<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VourcherRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'vourcher'=> 'required',
            'amount' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'vourcher.required' => 'Missing Vourcher Number',
            'amount.required'=>'Missing Amount',
            'amount.numeric' => 'The amount must be a number.',
        ];
    }
}
