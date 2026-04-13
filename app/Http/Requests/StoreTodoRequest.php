<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreTodoRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:100'],
            'description' => ['nullable','string', 'max:3000'],
            'status' => ['required', Rule::in('未着手','進行中','完了')],
            'started_at' => ['nullable','date'],
            'completed_at' => ['nullable','date', 'after_or_equal:started_at'],
        ];
    }
    public function attributes(): array
    {
        return[
            'title' => 'タイトル',
            'description' => '詳細',
            'status' => 'ステータス',
            'started_at' => '開始日',
            'completed_at' => '完了日',
        ];
    }

    // protected function prepareForValidation(): void
    // {
    //     // dd($this->all());
    // }
}
