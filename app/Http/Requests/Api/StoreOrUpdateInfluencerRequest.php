<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
#use Illuminate\Validation\Rule;

class StoreOrUpdateInfluencerRequest extends FormRequest
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
            'instagram_username' => [
                'required',
                'string',
                'max:30',
                #Rule::unique('influencers', 'instagram_username')->ignore($this->input('instagram_username')),
            ],
            'followers_count' => 'required|integer|min:0',
            'category' => 'required|string|max:50',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O campo nome é obrigatório.',
            'instagram_username.required' => 'O nome de usuário do Instagram é obrigatório.',
            'instagram_username.unique' => 'Este nome de usuário do Instagram já está em uso.',
            'followers_count.required' => 'O campo quantidade de seguidores é obrigatório.',
            'category.required' => 'O campo categoria é obrigatório.',
        ];        
    }
}
