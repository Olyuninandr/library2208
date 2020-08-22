<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Book;
use App\Models\Author;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getMyBooks()
    {
        $user_id = Auth::user()->id;
        $booksList = Book::where('created_by', $user_id)
            ->select(['name', 'id'])
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view('home', compact('booksList'));
    }
}
