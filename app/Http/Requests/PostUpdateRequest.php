<?php

namespace App\Http\Requests;

use App\Models\Post;
use Illuminate\Foundation\Http\FormRequest;

class PostUpdateRequest extends FormRequest
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
        $regex = '/^https:\/\/player\.vimeo\.com\/video\/\d+/';
        $rules = [
            'name' => 'required|max:100',
            'status' => 'required|in:1,2',
            'category_id' => 'required',
            'images' => 'sometimes|nullable',
            'images.*' => 'sometimes|nullable|image|mimes:jpeg,png,jpg|max:3072000',
            'video' => 'nullable|sometimes|regex:' . $regex
        ];

        if ($this->status == 2) {
            $post = $this->route('post'); // Obtiene el post de la ruta
            $rules = array_merge($rules, [
                'body' => 'required',
            ]);

              // Validar 'images' solo si el post no tiene imágenes existentes
              if (!$post || $post->images->isEmpty()) {
                $rules = array_merge($rules, [
                    'images' => 'required',
                    'images.*' => 'required|image|mimes:jpeg,png,jpg|max:3072000',
                ]);
            }

        }

        return $rules;
    }
}
