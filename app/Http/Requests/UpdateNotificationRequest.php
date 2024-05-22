<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNotificationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow the user to update a new notification if they have role of admin
        return $this->user()->role === 'admin';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_id' => ['required', 'exists:users,id'], // 'exists' rule checks if the user_id exists in the 'users' table 'id' column
            'date' => ['nullable', 'date'],
            'title' => ['required', 'string'],
            'description' => ['required', 'string', 'max:2000'],
            'file' => ['array', 'max:10'],
            'file.*' => ['file', 'max:5120'],
        ];
    }
}
