<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequst extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if ($this->user_id== auth()->user()->id) {
            return true;
        }else{
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        $rules = [
            'titulo' => 'required',
            'status' => 'required|in:1,2',
        ];
    
        if ($this->status == 2) {
            $rules = array_merge($rules, [
                'category_id' => 'required',
                'extract' => 'required',
                'body' => 'required',
                'image.*' => 'required|mimes:png,jpg,jpeg|max:5120',
            ]);
        }
    
        return $rules;
    }
}
