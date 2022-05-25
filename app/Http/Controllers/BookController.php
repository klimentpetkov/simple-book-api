<?php

namespace App\Http\Controllers;

use App\Book;
use App\Http\Requests\StoreBookRequest;
use App\Http\Resources\Book as BookResource;
use Symfony\Component\HttpFoundation\Response;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', Book::class);

        $books = Book::with('author')->paginate();

        return (BookResource::collection($books))
            ->response()
            ->setStatusCode(Response::HTTP_PARTIAL_CONTENT);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\StoreBookRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookRequest $request)
    {
        $this->authorize('create', Book::class);

        $book = Book::create($request->validated());

        return (BookResource::make($book))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        $this->authorize('view', $book);

        return BookResource::make($book->load('author'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Book  $book
     * @param  App\Http\Requests\StoreBookRequest $request
     * @return \Illuminate\Http\Response
     */
    public function update(Book $book, StoreBookRequest $request)
    {
        $this->authorize('update', $book);

        $book->update($request->validated());

        return (BookResource::make($book))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $this->authorize('delete', $book);

        $book->delete();

        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
