<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlimentationRequest extends FormRequest
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
            'date_alimentation' => ['required', 'date'],
            'heure_alimentation' => ['required', 'date_format:H:i'],
            'nourriture' => ['required', 'string', 'max:50'],
            'quantite' => ['required', 'numeric'],
            'animal_id' => ['required', 'integer'],
        ];
    }
}
