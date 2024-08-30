<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Cviebrock\EloquentSluggable\Sluggable;

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
        return [
            'title' => 'required|min:3',
            'description' => 'required|min:10',
//            'creator_id' => 'required',
            "image" => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    public function messages() :array
    {
        return [
            'title.required' => 'Title is required',
            'title.min' => 'Title must be at least 3 characters',
            'description.required' => 'Description is required',
            'description.min' => 'Description must be at least 10 characters',
//            'creator_id.required' => 'Creator by is required',
            'image.image' => 'Image must be an image',
            'image.mimes' => 'Image must be a file of type: jpeg, png, jpg, gif, svg',
            'image.max' => 'Image must be less than 2MB',
        ];
    }
}
