<?php

namespace App\Http\Requests\Web\Ticket;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateTicket extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('ticket.edit', $this->ticket);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'reference_number' => ['sometimes', Rule::unique('tickets', 'reference_number')->ignore($this->ticket->getKey(), $this->ticket->getKeyName()), 'string'],
            'title' => ['sometimes', Rule::unique('tickets', 'title')->ignore($this->ticket->getKey(), $this->ticket->getKeyName()), 'string'],
            'description' => ['nullable', 'string'],
            'resolved' => ['sometimes', 'boolean'],
            'reporter_name' => ['sometimes', 'string'],
            'reporter_email' => ['sometimes', 'string'],
            'created_by' => ['nullable', 'string'],
            'su_application_id' => ['sometimes', 'string'],
            
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
