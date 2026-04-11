<?php

declare(strict_types=1);

namespace App\Http\Requests\DealerLocation;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class IndexDealerLocationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, ValidationRule|array<string>|string>
     */
    public function rules(): array
    {
        return [
            'zip_code' => ['nullable', 'string', 'max:20'],
        ];
    }
}
