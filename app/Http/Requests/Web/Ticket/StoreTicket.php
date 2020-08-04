<?php

namespace App\Http\Requests\Web\Ticket;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreTicket extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('ticket.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'reference_number' => ['required', Rule::unique('tickets', 'reference_number'), 'string'],
            'title' => ['required', Rule::unique('tickets', 'title'), 'string'],
            'description' => ['nullable', 'string'],
            'resolved' => ['required', 'boolean'],
            'reporter_name' => ['required', 'string'],
            'reporter_email' => ['required', 'string'],
            'created_by' => ['nullable', 'string'],
            'su_application_id' => ['required', 'string'],
            
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
