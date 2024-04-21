<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HoraireRequest extends FormRequest
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
            'ouverture_matin' => ['required', 'string', 'max:50'],
            'ouverture_soir' => ['nullable', 'string', 'max:50'],
            'fermeture_matin' => ['nullable', 'string', 'max:50'],
            'fermeture_soir' => ['required', 'string', 'max:50']
        ];
    }
}
