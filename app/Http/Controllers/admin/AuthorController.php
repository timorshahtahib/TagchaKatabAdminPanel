<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthorRequest;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = Author::all();
        return view('admin.author.index', compact('authors'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.author.add_author');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(AuthorRequest $request)
    {


        $vlaidated = $request->validated();


        $name = $request->file('image')->getClientOriginalName();
        $path = $request->file('image')->store('public/images/author_image');
        $path=$string = substr($path, 27);

        $author = auth()->user()->Authors()->create([
            'name' => $vlaidated['name'],
            'last_name' => $vlaidated['last_name'],
            'bio' => $vlaidated['bio'],
            'image_link' =>  $path
        ]);

//        $author->categorise()->attach($request->input('category'));
        return redirect('admin/Add_Author/create')->with('status', 'نویسنده موفقانه اضافه شد');;
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Author $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Author $author
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(int $id)
    {
        $author=Author::find($id);


        return view('admin.author.edit_author', [
            'author' => $author
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Author $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Author $author)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {



        $author = Author::findOrFail($id);
        $image_path = public_path().'/images/author_image/'.$author->image_link;


        if (unlink('.'.Storage::url('images/author_image/'.$author->image_link))){
            $author->delete();

        };
//        if(file_exists($image_path)) // check if the image indeed exists
//            unlink($image_path);
//        $news->delete();

//        $data = Author::find($id);
//        $destinationPath = '/images/author_image/';
//        File::delete($destinationPath.$data->image_link);
//
//        $data->delete();



//Author::destroy($author);
////
////        $applicant_id=$author->input('applicant_id');
////
//////        $applicant = Applicant::where('fk_user_details_id',$applicant_id)->delete();
//////        $userDetail = UserDetail::where('fk_users_id',$applicant_id)->delete();
////        User::destroy($applicant_id);
////        return redirect('/applicant_list')->with('success', 'Applicant Removed');
//
//
//
//        $author->delete();

        return back();

    }




}
