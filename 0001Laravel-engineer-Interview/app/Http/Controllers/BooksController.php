<?php

declare (strict_types=1);

namespace App\Http\Controllers;

use App\Book;
use App\BookReview;
use App\Http\Requests\PostBookRequest;
use App\Http\Requests\PostBookReviewRequest;
use App\Http\Resources\BookResource;
use App\Http\Resources\BookReviewResource;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function getCollection(Request $request)
    {
        return BookResource::collection(Book::paginate(10));
    }

    public function getReviewCollection(Request $request)
    {
        return BookReviewResource::collection(BookReview::paginate(10));
    }

    public function post(PostBookRequest $request)
    {
        $book = new Book();
        $book->isbn = $request->isbn;
        $book->title = $request->title;
        $book->description = $request->description;
        $book->save();
        return response()->json($book, 201);
    }

    public function postReview(Book $book, PostBookReviewRequest $request)
    {
        $review = new BookReview($request->all());
        $book->reviews()->save($review);
        return response([
            'data' => new BookReviewResource($review)
        ], 201);
    }

    public function search($title)
    {
        $search = Book::where("title", "like", "%" . $title . "%")
                    ->get();
        return $search;
    }
}
