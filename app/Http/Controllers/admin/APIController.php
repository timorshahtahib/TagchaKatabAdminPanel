<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Doctrine\Common\Cache\Psr6\get;

class APIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Book[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {

        $new_books=Book::query()->with('SubCategory','author')->skip(0)->take(10)->orderBy('created_at', 'DESC')->get();

        $Hot_books = Book::query()->with('SubCategory','author')->where('is_hot', 1)->skip(0)->take(10)->orderBy('created_at')->get();
        $authors = Author::orderBy('created_at')->skip(0)->take(10)->get();
        return ["new_books"=>$new_books,"HotBooks" => $Hot_books, 'authors' => $authors];


    }

    public function HotBooks()
    {

        $Hot_books = Book::where('is_hot', 1)->skip(0)->take(10)->orderBy('created_at')->get();

        return ["HotBooks" => $Hot_books];


    }

    public function getNewBookByCategory($id)
    {

        $catgory=Category::find($id);
        return ['books'=>$catgory->books];

    }

    public function authors()
    {
        $authors = Author::orderBy('created_at')->get();
        return ['authors' => $authors];

    }

    public function search($name)
    {
        return Book::where('title', 'like', '%' . $name . '%')->orwhere('body', 'like', '%' . $name . '%')->get();
    }


    public function getSubCategory(Category $Category)
    {


        return $Category->SubCategory;

    }



    public function geCategory()
    {
        return ['category'=>Category::all()];
    }


//    public function geSubCategory($id)
//    {
//
//        $sub=SubCategory::where('category_id',$id)-get();
//        return ['subcategory'=>$sub];
//    }


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

//
//    public function login($email)
//    {
//
////        $fields = $request->validate([
////            'email' => 'required',
////            'name' => 'required',
////            'device_token' => 'required',
////
////        ]);
//
//
//        $user = User::where('email', $email)->first();
//
//        if (!$user) {
//            $user = User::create([
//                'email' => $email,
//                'name' =>$email,
//                'device_token' => $email,
//                'fcm_token' =>  $email,
//                'password' => bcrypt('password'),
//            ]);
//
//
//        }
//
//        $message="ok";
//    return response(['user'=>$user]);
//     ///   return response(['message'=>$message]);
//
//    }

    public function login(Request $request)
    {

        $fields = $request->validate([
            'email' => 'required',
            'name' => 'required',
            'device_token' => 'required',

        ]);


        $user = User::where('email', $fields['email'])->first();

        if (!$user) {
            $user = User::create([
                'email' => $fields['email'],
                'name' => $fields['name'],
                'device_token' => $fields['device_token'],
                'fcm_token' =>  $fields['device_token'],
                'password' => bcrypt('password'),
            ]);
        }else{
            $user->update($request->all());
        }

        $message="ok";
    return response()->json(['user'=>$user]);
     ///   return response(['message'=>$message]);

    }
}
