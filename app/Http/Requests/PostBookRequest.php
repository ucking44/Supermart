<?php

namespace App\Http\Requests;

use App\Author;
use App\Book;
use Illuminate\Foundation\Http\FormRequest;

class PostBookRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'isbn' => 'required | unique:books',
            'title' => 'required',
            'description' => 'required',
        ];
    }
}
