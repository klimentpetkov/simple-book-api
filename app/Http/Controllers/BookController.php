<?php

namespace App\Http\Controllers;

use App\Book;
use App\Http\Resources\Book as BookResource;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        return BookResource::collection(Book::with('author')->paginate());
    }

    public function show(Book $book)
    {
        return \App\Http\Resources\Book::make($book->load('author'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'author_id' => 'exists:users,id',
        ]);

        return \App\Http\Resources\Book::make(Book::create($data));
    }

    public function destroy(Book $book)
    {
        return response()->json([
            'status' => $book->delete()
        ], 200);
    }
}
