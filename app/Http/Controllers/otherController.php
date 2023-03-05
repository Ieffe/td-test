<?php

namespace App\Http\Controllers;

use App\Models\Book;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class otherController extends Controller
{
    public function search(Request $request)
    {
        $keyword = $request->search;
        $items = $request->items ? $request->items : 10;

        $bookList = DB::table("reviews")
        ->selectRaw('books.name as title, authors.name as author, categories.category as category, avg(reviews.rating) as rating, count(reviews.rating) as voters')
        ->where(function ($query) use ($keyword){
            $query->where('books.name', 'like', '%' . $keyword . '%')
            ->orWhere('authors.name', 'like', '%' . $keyword . '%');
        })
        ->join("books", function($join){
            $join->on("reviews.book_id", "=", "books.id");
        })
        ->join("categories", function($join){
            $join->on("books.cat_id", "=", "categories.id");
        })
        ->join("authors", function($join){
            $join->on("books.auth_id", "=", "authors.id");
        })
        ->orderByDesc('rating')->orderByDesc('voters')
        ->groupBy('reviews.book_id')->paginate($items);


        return View::make('index')
        ->with('bookList', $bookList)
        ->with('items' , $items)
        ->with('search', $keyword);


    }

    public function bestAuthor()
    {
        $best = DB::select('SELECT a.name as author, COUNT(r.rating) as voters FROM reviews r JOIN books b ON r.book_id = b.id JOIN categories c ON b.cat_id = c.id JOIN authors a on b.auth_id = a.id WHERE r.rating > 5 GROUP BY b.auth_id ORDER by COUNT(r.rating) DESC LIMIT 10;');

        return View::make('top')->with('best', $best);
    }



    public function getBookAjax(Book $book, $authId)
    {
        $getBook = $book->where('auth_id', $authId)->get();
        return response()->json($getBook);
    }
}
