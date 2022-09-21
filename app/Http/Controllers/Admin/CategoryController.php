<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryFormRequest;

class CategoryController extends Controller
{
    public function index(){
        
        return view('admin.category.index');
    }

    public function create(){

        return view('admin.category.create');
    }

    public function store(CategoryFormRequest $request){

        $validatedDate = $request->validated();

        $category = new Category;
        $category->name = $validatedDate['name'];
        $category->slug = $validatedDate['slug'];
        $category->description = $validatedDate['description'];

        if($request->hasFile('image')){

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;

            $file->move('uploads/category/',$filename);
            $category->image = $filename;
        }
        

        $category->meta_title = $validatedDate['meta_title'];
        $category->meta_keyword = $validatedDate['meta_keyword'];
        $category->meta_description = $validatedDate['meta_description'];

        $category->status = $request->status == true ? '1':'0';

        $category->save();

        return redirect('admin/category')->with('message','Category Added Successfully');



    }
}
