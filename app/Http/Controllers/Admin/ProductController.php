<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\ProductFormRequest;

class ProductController extends Controller
{
    
    // Retrive Product data
    public function index(){

        $products = Product::all();
        return view('admin.products.index',compact('products'));
    }


    // Insert Product Data 
    public function create(){

        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.products.create', compact('categories','brands'));
    }

    public function store(ProductFormRequest $request){

        $validateDate = $request->validated();

        $category = Category::findOrFail($validateDate['category_id']);

        $product =  $category->products()->create([
            'category_id' => $validateDate['category_id'],
            'name' => $validateDate['name'],
            'slug' => Str::slug($validateDate['slug']),
            'brand' => $validateDate['brand'],
            'small_description' => $validateDate['small_description'],
            'description' => $validateDate['description'],
            'original_price' => $validateDate['original_price'],
            'selling_price' => $validateDate['selling_price'],
            'quantity' => $validateDate['quantity'],
            'trending' => $request->trending == true ? '1':'0',
            'status' => $request->status == true ? '1':'0',
            'meta_title' => $validateDate['meta_title'],
            'meta_keyword' => $validateDate['meta_keyword'],
            'meta_description' => $validateDate['meta_description'],
        ]);

       // return $product->id;

       if($request->hasFile('image')){
            $uploadPath = 'uploads/products/';

            $i = 1;
            foreach($request->file('image') as $imageFile){
                $extension = $imageFile->getClientOriginalExtension();
                $filename = time().$i++.'.'.$extension;
                $imageFile->move($uploadPath,$filename);
                $finalImagePathName = $uploadPath.$filename;

                $product->productImages()->create([
                    'product_id' => $product->id,
                    'image' => $finalImagePathName,
                ]);
            }
       }

       return redirect('/admin/products')->with('message','Product Added Successfully');

    }

    //  Get Product Data in form for updating
    public function edit(int $product_id){

        $categories = Category::all();
        $brands = Brand::all();
        $product = Product::findOrFail($product_id);
        return view('admin.products.edit', compact('categories','brands','product'));

    }

    // Product data Update 
    public function update(ProductFormRequest $request, int $product_id){

        $validateDate = $request->validated();

        $product = Category::findOrFail($validateDate['category_id'])
                            ->products()->where('id',$product_id)->first();

        if($product){

            $product->update([
                'category_id' => $validateDate['category_id'],
                'name' => $validateDate['name'],
                'slug' => Str::slug($validateDate['slug']),
                'brand' => $validateDate['brand'],
                'small_description' => $validateDate['small_description'],
                'description' => $validateDate['description'],
                'original_price' => $validateDate['original_price'],
                'selling_price' => $validateDate['selling_price'],
                'quantity' => $validateDate['quantity'],
                'trending' => $request->trending == true ? '1':'0',
                'status' => $request->status == true ? '1':'0',
                'meta_title' => $validateDate['meta_title'],
                'meta_keyword' => $validateDate['meta_keyword'],
                'meta_description' => $validateDate['meta_description'],
            ]);

            if($request->hasFile('image')){
                $uploadPath = 'uploads/products/';
    
                $i = 1;
                foreach($request->file('image') as $imageFile){
                    $extension = $imageFile->getClientOriginalExtension();
                    $filename = time().$i++.'.'.$extension;
                    $imageFile->move($uploadPath,$filename);
                    $finalImagePathName = $uploadPath.$filename;
    
                    $product->productImages()->create([
                        'product_id' => $product->id,
                        'image' => $finalImagePathName,
                    ]);
                }
           }
    
           return redirect('admin/products')->with('message','Product Updated Successfully');

        }else{
            return redirect('admin/products')->with('message','No Such Product Id Found');
        }

    }

    // Product single image delete
    public function destroyImage(int $product_image_id){

        $productImage = ProductImage::findOrFail($product_image_id);
        if(File::exists($productImage->image)){
            File::delete($productImage->image);
        }
        $productImage->delete();
        return redirect()->back()->with('message','Product Image Deleted');

    }


    // Product delete with its images
    public function destroy(int $product_id){

        $product = Product::findOrFail($product_id);
        if($product->productImages){
            foreach($product->productImages as $imageItem){
                if(File::exists($imageItem->image)){
                    File::delete($imageItem->image);
                }
            }
        }

        $product->delete();
        return redirect('admin/products')->with('message','Product Deleted with its images');

    }


    

}