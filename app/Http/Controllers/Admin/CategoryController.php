<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\CategoryFormRequest;

class CategoryController extends Controller
{
    // 
    public function index(){
        
        return view('admin.category.index');
    }

    // Create function
    public function create(){

        return view('admin.category.create');
    }

    // Insert Category function
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

    // Edit Category function
    public function edit(Category $category){

       return view('admin.category.edit', compact('category'));
    }

    // Update Category function 
    public function update(CategoryFormRequest $request, $category){

        $validatedDate = $request->validated();
       // dd($validatedDate);
        $category = Category::findOrFail($category);

        $category->name = $validatedDate['name'];
        $category->slug = $validatedDate['slug'];
        $category->description = $validatedDate['description'];

        if($request->hasFile('image')){

            $path = 'uploads/category/'.$category->image;
            if(File::exists($path)){
                File::delete($path);
            }

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

        $category->update();

        return redirect('admin/category')->with('message','Category Update Successfully');

    }





}
