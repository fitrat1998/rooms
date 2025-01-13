<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVisitRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'guest_id' => 'required|integer|exists:guests,id',
            'position' => 'required|string|max:255',
            'reason' => 'required|string|max:255',
            'tarif' => 'required|string|max:255',
            'visa' => 'nullable|in:yes,no',
            'visa_start' => 'nullable',
            'visa_end' => 'nullable',
            'registration' => 'nullable|in:yes,no',
            'registration_start' => 'nullable',
            'registration_end' => 'nullable',
            'bed_id' => 'required|integer|exists:beds,id',
            'comment' => 'nullable|string|max:1000',
            'arrive' => 'required',
            'leave' => 'required',
        ];
    }
}
