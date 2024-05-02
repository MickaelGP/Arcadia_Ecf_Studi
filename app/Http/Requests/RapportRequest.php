<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RapportRequest extends FormRequest
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
            'date' => ['required', 'date'],
            'detail' => ['string', 'max:255', 'nullable'],
            'nourriture' => ['required', 'string', 'max:50'],
            'etat' => ['string', 'max:50', 'required'],
            'quantite' => ['required', 'int'],
            'animal_id' => ['required', 'int'],
        ];
    }
}
