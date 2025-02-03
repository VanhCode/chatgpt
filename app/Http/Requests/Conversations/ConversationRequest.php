<?php

namespace App\Http\Requests\Conversations;

use Illuminate\Foundation\Http\FormRequest;

class ConversationRequest extends FormRequest
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
            'user_id' => 'required|exists:users,id',
            'name' => 'required|string|max:255',
            'prompt' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'user_id.required' => 'Vui lòng chọn người dùng',
            'name.required' => 'Vui lòng nhập tên cuộc trò chuyện',
            'prompt.required' => 'Vui lòng nhập tin nhắn',
        ];
    }
}
