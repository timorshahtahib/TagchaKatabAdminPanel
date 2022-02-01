<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $books = Book::all();
        return view('admin.book.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
      //  $categories=\App\Models\Category::query()->with('SubCategory')->get();
        $categories=Category::all();
        $SubCategories=SubCategory::all();
        return  view('admin.book.add_book',compact('categories','SubCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(BookRequest $request)
    {
        $vlaidated = $request->validated();

        $image_path = $request->file('image_link')->store('public/images/book_image');
        $image_path=$string = substr($image_path, 25);

        $book_path = $request->file('download_link')->store('public/books');
        $book_path=$string = substr($book_path, 13);

        $author = auth()->user()->Bookes()->create([
            'title' => $vlaidated['title'],
            'slug' => $vlaidated['title'],
            'body' => $vlaidated['body'],
            'language' => $vlaidated['lan'],
            'download_link' => $book_path,
            'image_link' => $image_path,
            'sub_category_id' => $vlaidated['sub_category'],
            'author_id' => $vlaidated['author_id'],
            'another_language_text' => 'فارسی',
            'another_language' => 0,
            'size' => $vlaidated['page'],
            'page' => $vlaidated['page'],
            'is_hot' => 1,
        ]);

        return redirect('admin/BookController/create')->with('status', 'کتاب موفقانه اضافه شد');;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(int $id)
    {

        $Book = Book::findOrFail($id);

        unlink('.'.Storage::url('images/book_image/'.$Book->image_link));
        unlink('.'.Storage::url('books/'.$Book->download_link));
        $Book->delete();


        return back();
    }
}
