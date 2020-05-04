<?php

namespace App\Http\Requests\Web\Bug;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreBug extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('bug.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'reference_number' => ['required', Rule::unique('bugs', 'reference_number'), 'string'],
            'title' => ['required', Rule::unique('bugs', 'title'), 'string'],
            'description' => ['nullable', 'string'],
            'resolved' => ['required', 'boolean'],
            'created_by' => ['required', 'string'],
            'resolved_by' => ['required', 'string'],
            'resolved_at' => ['required', 'date'],
            
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
