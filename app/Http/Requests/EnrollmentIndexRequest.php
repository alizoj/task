<?php

namespace App\Http\Requests;

use App\Enums\EnrollmentStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class EnrollmentIndexRequest extends FormRequest
{
    public function authorize(): bool
    {
        return false;
    }

    public function rules(): array
    {
        return [
            'status' => [
                'in', new Enum(EnrollmentStatus::class)
            ],
            'sort' => 'in:status|nullable',
            'order' => 'in:asc,desc|default:asc',
        ];
    }
}
