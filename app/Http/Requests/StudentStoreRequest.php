<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentStoreRequest extends FormRequest {
    /**
    * Determine if the user is authorized to make this request.
    */

    public function authorize(): bool {
        return true;
    }

    /**
    * Get the validation rules that apply to the request.
    *
    * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
    */

    public function rules(): array {
        return [
            'name' => 'required|string|max:5',
            'email' => 'required|email|unique:students,email',
            'date_of_birth' => 'required|date',
            'student_type' => 'required|string|exists:student_types,student_type',
            'card_number' => 'required|string|unique:students,card_number',
        ];
    }
}
