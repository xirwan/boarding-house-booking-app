<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerInformationStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|regex:/^[A-Za-z ]+$/',
            'email' => 'required|email|',
            'phone' => ['required', 'string', 'regex:/^(?:\+62|62|0)[2-9]\d{7,11}$/'],
            'duration'=> 'required',
            'start_date' => 'required',
        ];
    }
}
