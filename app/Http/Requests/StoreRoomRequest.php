<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRoomRequest extends FormRequest
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
            'floors' => 'required|integer',
            'rooms' => 'required|integer|min:1|max:1000',
            'beds' => 'required|integer|min:1',
            'comment' => 'nullable|string|max:255',
            'status' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'floors.required' => 'Iltimos, qavatni tanlang.',
            'floors.integer' => 'Qavatlar soni butun son bo‘lishi kerak.',
            'rooms.required' => 'Iltimos, xona raqamini kiriting.',
            'rooms.integer' => 'Xona raqami butun son bo‘lishi kerak.',
            'rooms.min' => 'Xona raqami kamida 1 bo‘lishi kerak.',
            'rooms.max' => 'Xona raqami 1000 dan oshmasligi kerak.',
            'beds.required' => 'Iltimos, joylar sonini kiriting.',
            'beds.integer' => 'Joylar soni butun son bo‘lishi kerak.',
            'beds.min' => 'Joylar soni kamida 1 bo‘lishi kerak.',
            'comment.string' => 'Izoh matn ko‘rinishida bo‘lishi kerak.',
            'comment.max' => 'Izoh matni 255 belgidan oshmasligi kerak.',
        ];
    }

}
