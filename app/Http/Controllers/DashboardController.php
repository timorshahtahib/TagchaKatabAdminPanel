<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\SubCategory;

use App\Models\Author;


class DashboardController extends Controller
{




 public function index()
{



    $books=Book::all();
    $author=Author::all();
    $category=SubCategory::all();
    return view('admin.dashboard',compact(['books','author','category']));
    //
}
}
