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
            'visa' => 'required|in:yes,no',
            'visa_start' => 'nullable',
            'visa_end' => 'nullable',
            'reg' => 'required|in:yes,no',
            'registration_start' => 'nullable',
            'registration_end' => 'nullable',
            'bed_id' => 'required|integer|exists:beds,id',
            'comment' => 'nullable|string|max:1000',
            'arrive' => 'required',
            'leave' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'guest_id.required' => 'Mehmoni tanlash majburiy.',
            'position.required' => 'Lavozim maydonini tanlash majburiy.',
            'position.string' => 'Lavozim maydoni matn bo‘lishi kerak.',
            'position.max' => 'Lavozim maydoni 255 ta belgidan oshmasligi kerak.',
            'reason.required' => 'Kelish sababi maydonini to`ldirish majburiy.',
            'reason.string' => 'Sabab matn bo‘lishi kerak.',
            'reason.max' => 'Sabab maydoni 255 ta belgidan oshmasligi kerak.',

            'tarif.required' => 'Tarif maydonini tanlash majburiy.',

            'visa.required' => 'Viza maydonini tanlash majburiy.',
            'visa.in' => 'Viza faqat "yes" yoki "no" bo‘lishi mumkin.',

            'visa_start.date' => 'Viza boshlanish sanasi noto‘g‘ri formatda.',
            'visa_end.date' => 'Viza tugash sanasi noto‘g‘ri formatda.',

            'reg.required' => 'Ro‘yxatga olish maydoni majburiy.',
            'registration.in' => 'Ro‘yxatga olish faqat "yes" yoki "no" bo‘lishi mumkin.',

            'registration_start.date' => 'Ro‘yxatga olish boshlanish sanasi noto‘g‘ri formatda.',
            'registration_end.date' => 'Ro‘yxatga olish tugash sanasi noto‘g‘ri formatda.',

            'bed_id.required' => 'Yotoq o`rnini tanlash majburiy.',

            'comment.string' => 'Izoh matn bo‘lishi kerak.',
            'comment.max' => 'Izoh maydoni 1000 ta belgidan oshmasligi kerak.',

            'arrive.required' => 'Kelish sanasini tanlash majburiy.',
            'arrive.date' => 'Kelish sanasi noto‘g‘ri formatda.',

            'leave.required' => 'Ketish sanasini tanlash majburiy.',
            'leave.date' => 'Ketish sanasi noto‘g‘ri formatda.',
            'leave.after_or_equal' => 'Ketish sanasi kelish sanasidan oldin bo‘lishi mumkin emas.',
        ];
    }
}
