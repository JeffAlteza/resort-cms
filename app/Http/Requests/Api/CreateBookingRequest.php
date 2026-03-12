<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class CreateBookingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email:filter',
            'cellphone' => 'required|string|max:20',
            'checkin' => 'required|date',
            'checkout' => 'required|date|after:checkin',
            'message' => 'nullable|string',
        ];
    }
}
