<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AviRequest extends FormRequest
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
        if (!auth()->user()) {
            return [
                'pseudo' => ['required', 'string', 'max:50'],
                'commentaire' => ['required', 'string', 'max:255'],
            ];
        }elseif(auth()->user()->role->label === 'employé'){
            return [
                'isValide' => ['required', 'int']
            ];
        }
            
    }
}
