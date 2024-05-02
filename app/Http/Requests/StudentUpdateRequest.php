<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentUpdateRequest extends FormRequest
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
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|unique:students,email,' . $this->student->student_id . ',student_id',
            'date_of_birth' => 'sometimes|date',
            'student_type' => 'sometimes|string|exists:student_types,student_type',
            'card_number' => 'sometimes|string|unique:students,card_number,' . $this->student->student_id . ',student_id',
        ];
    }
}
