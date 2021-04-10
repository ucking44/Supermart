<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostBookReviewRequest extends FormRequest
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
            'review' => 'required',
            'comment' => 'required',
            'user_id' => 'required',
            'book_id' => 'required',
        ];
    }
}
