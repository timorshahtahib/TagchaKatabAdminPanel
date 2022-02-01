<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubCategoryRequest;
use App\Models\Book;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {

        $SubCategory = SubCategory::all();

        return view('admin.sub_category.index', compact('SubCategory'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {

        $categories=Category::all();
        return  view('admin.sub_category.add_sub_category',compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SubCategoryRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(SubCategoryRequest $request)
    {


        $validated=$request->validated();

        $image_path = $request->file('image_link')->store('public/images/sub_category_image');
        $image_path=$string = substr($image_path, 33);

        $subcategory=auth()->user()->SubCategories()->create([

            'name'=>$validated['name'],
            'description'=>$validated['description'],
            'category_id'=>$validated['category_id'],
            'image_link'=>$image_path


        ]);
        return redirect('admin/SubCategoryController/create')->with('status', 'کتاب موفقانه اضافه شد');;



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $subCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(int $subCategory)
    {

        $sub_category_model = SubCategory::findOrFail($subCategory);
        return  view('admin.sub_category.edit_sub_category',compact('sub_category_model'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(SubCategoryRequest $request, int $subCategory)
    {
        $vlaidated = $request->validated();
        $sub_categorym = SubCategory::findOrFail($subCategory);

        $image_path = $request->file('image_link')->store('public/images/sub_category_image');
        $image_path=$string = substr($image_path, 33);
        $vlaidated['image_link']=$image_path;

        $sub_categorym->update($vlaidated);
       // $subCategory->category()->sync($request->input('category_id'));
        return redirect('/admin/SubCategoryController');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(int $id)
    {
        $sub_category = SubCategory::findOrFail($id);
        unlink('.'.Storage::url('images/sub_category_image/'.$sub_category->image_link));
        $sub_category->delete();

        return back();
    }
}
