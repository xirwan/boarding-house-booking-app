<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingShowRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'code' => 'required',
            'email' => 'required|email',
            'phone_number' => ['required', 'string', 'regex:/^(?:\+62|62|0)[2-9]\d{7,11}$/'],
        ];
    }
}
