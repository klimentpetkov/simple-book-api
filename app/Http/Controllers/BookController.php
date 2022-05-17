<?php

namespace App\Http\Controllers;

use App\Book;
use App\Http\Requests\StoreBookRequest;
use App\Http\Resources\Book as BookResource;
use Symfony\Component\HttpFoundation\Response;

class BookController extends Controller
{
    public function index()
    {
        // $this->authorize('viewAny', Book::class);

        $books = Book::with('author')->paginate();

        return BookResource::collection($books);
    }

    public function store(StoreBookRequest $request)
    {
        // $this->authorize('create');

        $book = Book::create($request->validated());

        return (BookResource::make($book))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Book $book)
    {
        // $this->authorize('view', $book);

        return BookResource::make($book->load('author'));
    }

    public function update(Book $book, StoreBookRequest $request)
    {
        // $this->authorize('update', $bookRecord);

        $book->update($request->validated());

        return (BookResource::make($book))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    public function destroy(Book $book)
    {
        // $this->authorize('delete', $book);

        $book->delete();

        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
