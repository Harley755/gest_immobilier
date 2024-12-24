<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertyContactRequest extends FormRequest
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
            'firstname' => ['required', 'string', 'min:8'],
            'lastname' => ['required', 'string', 'min:8'],
            'phone' => ['required', 'integer', 'min:8'],
            'email' => ['required', 'email', 'min:4'],
            'message' => ['required', 'string', 'min:8'],
        ];
    }
}
