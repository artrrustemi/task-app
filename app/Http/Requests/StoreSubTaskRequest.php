<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubTaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
       
        return [
            'name' => 'required|string|max:255',
            'position' => 'required|numeric',
            'description' => 'required|string',
            'task_id' => 'required|numeric|exists:tasks,id'
        ];
    }
}
