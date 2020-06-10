<?php

namespace App\Http\Requests\Web\SuApplication;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreSuApplication extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('su-application.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => ['required', Rule::unique('su_applications', 'name'), 'string'],
            'description' => ['nullable', 'string'],
            'enabled' => ['required', 'boolean'],
            'department_id' => ['required', 'string'],
            'tags' => ['required','array'],
            'url' => ['required', 'string'],

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
