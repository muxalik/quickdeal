<?php

namespace App\Http\Requests\Task;

use App\Enums\TaskPriorities;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpstoreTaskRequest extends FormRequest
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
            'title' => ['required', 'string', 'between:2,100'],
            'content' => ['required', 'string', 'between:1,500'],
            'priority' => ['required', 'string', Rule::in(TaskPriorities::values())],
        ];
    }
}
