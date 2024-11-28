<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCampaignRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'budget' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'start_date' => 'required|date|after:now',
            'end_date' => 'required|date|after:start_date',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O nome da campanha é obrigatório.',
            'budget.required' => 'O orçamento é obrigatório.',
            'budget.numeric' => 'O orçamento deve ser um valor numérico.',
            'start_date.required' => 'A data de início é obrigatória.',
            'end_date.required' => 'A data de término é obrigatória.',
            'start_date.after' => 'A data de início deve ser uma data futura.',
            'end_date.after' => 'A data de término deve ser posterior à data de início.',
        ];
    }
}
