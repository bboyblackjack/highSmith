<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiController extends Controller
{
    public function getAllBooks()
    {
        return response()->json(Book::all(), 200, [], JSON_UNESCAPED_UNICODE);
    }

    public function getBook($id)
    {
        return response()->json(Book::find($id), 200, [], JSON_UNESCAPED_UNICODE);
    }

    public function updateBook($id, Request $request)
    {
        $book = Book::find($id);

        if(isset($request->name))
            $book->name = $request->name;
        if(isset($request->price))
            $book->price = $request->price;
        if(isset($request->author_id))
        {
            if(Author::find($request->authod_id) != null)
            {
                $book->author_id = $request->author_id;
            }
        }

        $book->save();

        return response()->json(['success' => 'success'], 200);
    }

    public function deleteBook($id)
    {
        Book::find($id)->delete();

        return response()->json(['success' => 'success'], 200);
    }
}
