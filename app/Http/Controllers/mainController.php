<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use App\Models\Review;
use App\Models\Author;

class mainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $bookList = DB::select('SELECT b.name as title, a.name as author, AVG(rating) as rating, COUNT(r.rating) as voters
        // FROM reviews r
        // JOIN books b ON r.book_id = b.id
        // JOIN categories c ON b.cat_id = c.id
        // JOIN authors a on b.auth_id = a.id
        // GROUP BY r.book_id
        // ORDER by AVG(r.rating) DESC, COUNT(r.rating) DESC');

        $items = $request->items ?? 10;
        $keyword = $request->search;

        $bookList = DB::table("reviews")
        ->selectRaw('books.name as title, authors.name as author, categories.category as category, avg(reviews.rating) as rating, count(reviews.rating) as voters')
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

        // dd($bookList);
        return View::make('index')
        ->with('bookList', $bookList)
        ->with('items' , $items)
        ->with('search', $keyword);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $author = Author::get();

        return View::make('create')->with('author', $author);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $review = new Review;
        $review->book_id = $request->book_id;
        $review->rating = $request->rating;

        $review->save();

        return redirect()->route('main.index')->with('success', 'Data has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }



}
