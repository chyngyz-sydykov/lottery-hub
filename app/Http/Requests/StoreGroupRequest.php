<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreGroupRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:2|max:100',
            'finishing_date' => 'required|date|after:today',
            'participant_limit' => 'required|integer|min:1',
            'prize_pool' => 'required|numeric|min:0',
            'price' => 'required|numeric|min:0',
            'status' => 'required|string|in:private,public,semi',
            'description' => 'nullable|string',
        ];
    }

    public static function getRules(): array
    {
        return (new self)->rules();
    }
}
