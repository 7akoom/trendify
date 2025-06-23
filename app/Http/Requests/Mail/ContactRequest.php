<?php

namespace App\Http\Requests\Mail;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'    => 'required|string|max:255',
            'phone'   => 'required|string|max:50',
            'email'   => 'required|email',
            'message' => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'    => __('contact.validation.name_required'),
            'phone.required'   => __('contact.validation.phone_required'),
            'email.required'   => __('contact.validation.email_required'),
            'message.required' => __('contact.validation.message_required'),
        ];
    }
}
