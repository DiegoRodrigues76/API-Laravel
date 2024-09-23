<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class TaskRequest extends FormRequest
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
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|in:pending,completed',
            'category_id' => 'required|exists:categories,id', // Verifica se a categoria existe
        ];
    }

    /**
     * Get custom messages for validation errors.
     */
    public function messages(): array
    {
        return [
            'title.required' => 'O campo "título" é obrigatório!',
            'title.string' => 'O título deve ser uma string!',
            'title.max' => 'O título não pode ter mais de :max caracteres!',

            'description.required' => 'O campo "descrição" é obrigatório!',
            'description.string' => 'A descrição deve ser uma string!',

            'status.required' => 'O campo "status" é obrigatório!',
            'status.in' => 'O status deve ser "pending" ou "completed"!',

            'category_id.required' => 'O campo "categoria" é obrigatório!',
            'category_id.exists' => 'A categoria selecionada não existe!',
        ];
    }
}
