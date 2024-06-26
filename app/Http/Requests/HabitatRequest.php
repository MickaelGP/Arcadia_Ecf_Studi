<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HabitatRequest extends FormRequest
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
        if (auth()->user()->role->label === 'administrateur') {
            return [
                'nom' => ['required', 'string', 'max:50'],
                'description' => ['required', 'string', 'max:255'],
                'commentaire' => ['nullable', 'string', 'max:255'],
                'image_data.*' => ['image', 'nullable'],
            ];
        }else{
            return [
                'commentaire' => ['nullable', 'string', 'max:255'],
            ];
        }
        
    }
}
