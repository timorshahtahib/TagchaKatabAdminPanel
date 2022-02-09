<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class APIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Book[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        $new_books = Book::orderBy('created_at')->skip(0)->take(10)->get();
        $Hot_books = Book::where('is_hot', 1)->skip(0)->take(10)->orderBy('created_at')->get();
        $authors = Author::orderBy('created_at')->skip(0)->take(10)->get();
        return ['new_books' => $new_books, "HotBooks" => $Hot_books, 'authors' => $authors];


    }

    public function authors(){
        $authors = Author::orderBy('created_at')->skip(0)->take(10)->get();
        return ['authors' => $authors];

    }


    public function getSubCategory(Category $Category)
    {


        return $Category->SubCategory;

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Book $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Book $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Book $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Book $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
    }
}
