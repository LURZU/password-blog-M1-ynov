<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreatePostRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            "name" => ['required', 'min:8'],
            "slug" => ['required','min:4', 'regex:/^[0-9a-z\-]+$/', Rule::unique('posts')->ignore($this->route()->parameter('post'))],
            "content" => ["required"],
            "category_id" => ["required", "exists:categories,id"],
            "tags" => ["array", "exists:tags,id", "required"],
            "image" => ["image", "max:2000"],
            "imagePath" => ["string", "nullable"]
        ];
    }

    public function prepareForValidation() {
        $this->merge([
            'slug' => $this->input('slug') ?: \Str::slug($this->input('name'))
        ]);
    }

     public function messages()
    {
        return[
            'name.required' => 'Le champs titre est requis ou doit comporter au moins 8 caractères',
            'content.required' => 'Le champs slug est requis ou doit comporter au moins 8 caractères',
            'slug.required' => 'Le slug est déjà utilisé ou doit comporter au moins 8 caractères',
            'category_id.required' => 'Vous devez sélectionner une catégorie valide',
        ];
    }


}
