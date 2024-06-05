<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class CompanyRequest extends FormRequest
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
            'user_id' => 'required|exists:users,id',
            'country_id' => 'required|exists:companies,id',
            'name' => 'required|string|min:3, max:225',
            'email' => ['required', 'string', 'email', 'min:3', 'max:255', Rule::unique('users')->ignore($this->user)],
        ];
    }

    public function passedValidation()
    {
        $this->merge([
            'user_id' => Auth::user()->id
        ]);
    }
}
