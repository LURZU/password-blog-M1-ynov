<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogFilterRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    // public function rules(): array
    // {
    //     return [
    //         'name' => ['required', 'string', 'max:255'],
    //         'slug' => ['required', 'regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/'],
    //     ];
    // }

    // public function prepareForValidation() {
    //     $this->merge([
    //         'slug' => $this->input('slug') ?: Str::slug($this->input('name')),
    //     ]);
    // }
}
