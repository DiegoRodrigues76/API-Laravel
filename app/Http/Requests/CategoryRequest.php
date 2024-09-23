<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Handle a failed validation attempt.
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status' => false,
            'errors' => $validator->errors(),
        ], 422));
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        $categoryId = $this->route('category');  // Obtém o ID da categoria da rota, se existir

        return [
            'name' => 'required|string|max:255|unique:categories,name,' . ($categoryId ? $categoryId->id : null),
        ];
    }

    /**
     * Get custom messages for validation errors.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'O campo "nome" da categoria é obrigatório!',
            'name.string' => 'O nome da categoria deve ser uma string!',
            'name.max' => 'O nome da categoria não pode ter mais de :max caracteres!',
            'name.unique' => 'O nome da categoria já está em uso!',
        ];
    }
}
