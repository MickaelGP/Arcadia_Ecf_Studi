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
            'ouverture_matin' => ['required', 'date_format:H:i'],
            'ouverture_soir' => ['nullable', 'date_format:H:i'],
            'fermeture_matin' => ['nullable', 'date_format:H:i'],
            'fermeture_soir' => ['required', 'date_format:H:i']
        ];
    }
}
