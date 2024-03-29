<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StoreItemRequest extends FormRequest
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
            'name' => 'required|max:255|min:3',
            'slug' => 'alpha_dash',
            'description' => 'max:300',
            'category_id' => 'required',
            'tags' => 'exists:tags,id'
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge(['slug' => Str::slug($this->name)]);
    }
}
