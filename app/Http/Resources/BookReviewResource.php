<?php

declare (strict_types=1);


namespace App\Http\Resources;

use App\Book;
use App\User;
use Illuminate\Http\Resources\Json\JsonResource;

class BookReviewResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'review' => $this->review,
            'comment' => $this->comment,
            'user_id' => User::all()->random()->id,
            'book_id' => Book::all()->random()->id,
        ];
    }
}
