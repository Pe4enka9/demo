<?php

namespace App\Http\Requests\Applications;

use App\Enums\PaymentMethod;
use App\Models\Service;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class CreateApplicationRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'service' => ['nullable', 'required_if:another_service,false', 'integer', Rule::exists(Service::class, 'id')],
            'address' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255', 'regex:/^\+7\(\d{3}\)-\d{3}-\d{2}-\d{2}$/'],
            'date' => ['required', 'date'],
            'another_service' => ['nullable', 'boolean'],
            'service_description' => ['required_if:another_service,true', 'string'],
            'payment_method' => ['required', new Enum(PaymentMethod::class)],
        ];
    }
}
