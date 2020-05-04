<?php

namespace App\Http\Requests\Web\Bug;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateBug extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('bug.edit', $this->bug);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'reference_number' => ['sometimes', Rule::unique('bugs', 'reference_number')->ignore($this->bug->getKey(), $this->bug->getKeyName()), 'string'],
            'title' => ['sometimes', Rule::unique('bugs', 'title')->ignore($this->bug->getKey(), $this->bug->getKeyName()), 'string'],
            'description' => ['nullable', 'string'],
            'resolved' => ['sometimes', 'boolean'],
            'created_by' => ['sometimes', 'string'],
            'resolved_by' => ['sometimes', 'string'],
            'resolved_at' => ['sometimes', 'date'],
            
        ];
    }

    /**
     * Modify input data
     *
     * @return array
     */
    public function getSanitized(): array
    {
        $sanitized = $this->validated();


        //Add your code for manipulation with request data here

        return $sanitized;
    }
}
