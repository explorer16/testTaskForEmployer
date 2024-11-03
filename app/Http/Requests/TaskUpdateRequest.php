<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id' => 'required|integer|exists:tasks,id',
            'title' => 'required|string|min:3|max:30',
            'description' => 'required|string|min:10|max:255',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Title is required.',
            'description.required' => 'Description is required.',
        ];
    }
}
