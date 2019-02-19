<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index()
    {
        $authors = Author::all();
        $books = Book::all();
        return view('index', ['authors' => $authors, 'books' => $books]);
    }

    public function createAuthor(Request $request)
    {
        $author = new Author();
        $author->firstname = $request->firstname;
        $author->middlename = $request->middlename;
        $author->lastname = $request->lastname;
        $author->save();
        return $author;
    }

    public function createBook(Request $request)
    {
        $book = new Book();
        $book->name = $request->name;
        $book->price = $request->price;
        $book->author_id = $request->author;
        $book->save();
        $book->author;
        return $book;
    }

    public function updateAuthor(Request $request)
    {
        $author = Author::find($request->id);
        $author->firstname = $request->firstname;
        $author->middlename = $request->middlename;
        $author->lastname = $request->lastname;
        $author->save();
        return $author;
    }

    public function updateBook(Request $request)
    {
        $book = Book::find($request->id);
        $book->name = $request->name;
        $book->price = $request->price;
        $book->author_id = $request->author_id;
        $book->save();
        $book->author;
        return $book;
    }
}
