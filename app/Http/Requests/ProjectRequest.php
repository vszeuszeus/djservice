<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'private' => 'boolean',
            'name' => 'string|max:150|required',
            'cover' => 'file|max:10240|nullable|mimes:jpeg,jpg,png',
            'file' => 'file|max:204800|required|mimes:mp3'
        ];
    }
}
