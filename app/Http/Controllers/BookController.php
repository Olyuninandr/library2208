<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Book;
use App\Models\Author;
use App\Http\Requests\BookRequest;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function getBooksList($author_id=null)
    {
        if(empty($author_id)) {
            $booksList = Book::select(['name', 'author_id', 'id'])->paginate(10);
        }

        else{
            $booksList = Book::where('author_id', $author_id)
                ->select(['name', 'author_id', 'id'])
                ->paginate(10);
        }

        return view('books', compact('booksList'));
    }

    public function submitBook(BookRequest $request, $id=null)
    {
        if($id != null) $book = Book::find($id);
        else $book = new Book();

        $book->name = $request->input('name');
        $book->created_by = Auth::user()->id;
        $book->pages = $request->input('pages');
        $book->short = rtrim($request->input('short'));
        $book->author_id = $request->input('author_id');

        $book->save();

        return redirect()->route('books')->with('success', 'Книга добавлена');
    }

    public function getBook($id)
    {
        $creator_id = Auth::user()->id;

        $book = Book::find($id);
        $authorsList = Author::select(['id', 'name'])->get();

        if(Auth::user()->id !== $book->created_by){
            return redirect()->route('home')
                ->withErrors(['Вы не можете редактировать эту книгу']);
        }
        else
        return view('add_book', compact('book', 'authorsList', 'creator_id'));
    }

    public function deleteBook($id)
    {
        Book::find($id)->delete();
        return redirect()->route('home')->with('success','Книга удалена');
    }
}
