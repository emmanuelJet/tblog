<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        $category = Category::latest()->paginate(5);
        return view('back-end.category.category',compact('category',$category));
    }


    public function store(Request $request)
    {
        $this->validate(request(),['category'=>'required|min:4|unique:categories']);

        $category = new Category();
        $category->category = $request->category;
        $cate = $category->category = $request->category;
        $category->slug = str_slug($cate,'-');
        $category->save();
        $notification = ['message'=>'New Category Has Been Added','alert-type'=>'success'];
        return redirect()->back()->with($notification);
    }


    public function show($id)
    {

    }


    public function edit($id)
    {

    }


    public function update(Category $category)
    {
        $this->validate(request(),['category'=>'required|min:4']);
        $category->category = request('category');
        $category->slug = str_slug('category','-');
        $category->save();
        $notification = ['message'=>'Category Has Been Updated','alert-type'=>'success'];
        return redirect()->back()->with($notification);
    }


    public function destroy($id)
    {
        Category::destroy($id);
        $notification = ['message'=>'Category Has Been Deleted','alert-type'=>'success'];
        return redirect()->back()->with($notification);
    }
}
