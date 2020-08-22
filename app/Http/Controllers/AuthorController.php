<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function getAuthorsList()
    {
        $authorsList = Author::select(['id', 'name'])->paginate(10);
        $count = [];
        $count[0]=0;
        foreach ($authorsList as $author) {
            $count[] = Book::where('author_id', $author->id)->count();
        }
        return view('authors', compact('authorsList','count'));
    }

    public function getAuthorsListSimple()
    {
        $authorsList = Author::select(['id', 'name'])->get();
        return view('add_book', compact('authorsList'));
    }
}
