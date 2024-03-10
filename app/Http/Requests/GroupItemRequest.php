<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GroupItemRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return
        [
			'group_id' => 'required',
			'student_id' => 'required',
			'started_at' => 'required',
			'finished_at' => 'required',
			'status' => 'required',
			'created_by' => 'required',
			'updated_by' => 'required',
        ];
    }
}
