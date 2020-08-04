<?php

namespace App\Http\Requests\Web\SuApplication;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateSuApplication extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('su-application.edit', $this->suApplication);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => ['sometimes', Rule::unique('su_applications', 'name')->ignore($this->suApplication->getKey(), $this->suApplication->getKeyName()), 'string'],
            'description' => ['nullable', 'string'],
            'enabled' => ['sometimes', 'boolean'],
            'department' => ['required', 'array'], //I hope what is in frontend  departments
            'tags' => ['sometimes','array'],
            'url' => ['sometimes', 'string'],
            'private' => ['sometimes','boolean'],
            'roles' => ['nullable', 'array']
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
