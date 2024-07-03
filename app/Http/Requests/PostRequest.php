<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
    public function rules()
    {
        $rules = [
            'name' => 'required|max:100',
            'status' => 'required|in:1,2',
            'category_id' => 'required',
        ];
    
        if ($this->status == 2) {
            $rules = array_merge($rules, [
                'body' => 'required',   
                'images' => 'required',
                'images.*' => 'required|mimes:jpeg,png,jpg|max:2048',
                
            ]);
        }
    
        return $rules;
    }

}