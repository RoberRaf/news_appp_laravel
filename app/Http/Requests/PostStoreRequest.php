<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\Models\Creator;

class PostStoreRequest extends FormRequest
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
            'title' => 'required|min:3|unique:App\Models\Post,title',
            'description' => 'required|min:10',
            "image" => 'image|required|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Title is required',
            'title.unique' => 'Title must be unique',
            'title.min' => 'Title must be at least 3 characters',
            'description.required' => 'Description is required',
            'description.min' => 'Description must be at least 10 characters',
            'user_id.excludeIf' => 'Cannot create more than 3 posts',
//            'creator_id.in' => 'Creator by is invalid',
            'image.required' => 'Image is required',
            'image.image' => 'Image must be an image',
            'image.mimes' => 'Image must be a file of type: jpeg, png, jpg, gif, svg',
            'image.max' => 'Image must be less than 2MB',
        ];
    }
}
