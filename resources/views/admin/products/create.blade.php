@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Product
                    <a href="{{ url('admin/products') }}" class="btn btn-danger btn-sm float-end">Back</a>
                </h3>
            </div>
            <div class="card-body">

                @if($errors->any())
                <div class="alert alert-warning">
                    @foreach($errors->all() as $error)
                    <div>{{$error}}</div>
                    @endforeach
                </div>
                @endif

                <form action="{{ url('admin/products') }}" method="POST" class="form-group"
                    enctype="multipart/form-data">
                    @csrf

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane"
                                aria-selected="true">Home</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="seotag-tab" data-bs-toggle="tab"
                                data-bs-target="#seotag-tab-pane" type="button" role="tab"
                                aria-controls="seotag-tab-pane" aria-selected="false">SEO Tags</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="details-tab" data-bs-toggle="tab"
                                data-bs-target="#details-tab-pane" type="button" role="tab"
                                aria-controls="details-tab-pane" aria-selected="false">Details</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="image-tab" data-bs-toggle="tab"
                                data-bs-target="#image-tab-pane" type="button" role="tab" aria-controls="image-tab-pane"
                                aria-selected="false">Product Images</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade border p-3 show active" id="home-tab-pane" role="tabpanel"
                            aria-labelledby="home-tab" tabindex="0">
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="">Product Category</label>
                                    <select name="category_id" class="form-select form-select-sm">
                                        <option value="">Select Category</option>
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="">Product Brand</label>
                                    <select name="brand" class="form-select form-select-sm">
                                        <option value="">Select Brand</option>
                                        @foreach($brands as $brand)
                                        <option value="{{ $brand->name }}">{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="">Product Name</label>
                                    <input type="text" name="name" class="form-control form-control-sm" placeholder="Enter Product Name here">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="">Product Slug</label>
                                    <input type="text" name="slug" class="form-control form-control-sm" placeholder="Enter Slug here">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="">Product Small Description (500 words)</label>
                                <textarea type="text" name="small_description"
                                    class="form-control form-control-sm" placeholder="Enter Description "></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="">Product Description</label>
                                <textarea type="text" name="description" class="form-control form-control-sm" placeholder="Enter Description " rows="3" ></textarea>
                            </div>

                        </div>
                        <div class="tab-pane fade border p-3" id="seotag-tab-pane" role="tabpanel"
                            aria-labelledby="seotag-tab" tabindex="0">
                            <div class="mb-3">
                                <label for="">Meta Title</label>
                                <textarea type="text" name="meta_title" class="form-control form-control-sm"
                                placeholder="Enter Meta Title here" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="">Meta kayword</label>
                                <textarea type="text" name="meta_keyword" class="form-control form-control-sm"
                                placeholder="Enter Meta Keyword here" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="">Meta Descrption</label>
                                <textarea type="text" name="meta_description" class="form-control form-control-sm"
                                    placeholder="Enter Meta Description here" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="tab-pane fade border p-3" id="details-tab-pane" role="tabpanel"
                            aria-labelledby="details-tab" tabindex="0">
                            <div class="row">
                                <div class="mb-3 col-md-4">
                                    <label for="">Original Price</label>
                                    <input type="number" name="original_price" class="form-control form-control-sm">
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label for="">Selling Price</label>
                                    <input type="number" name="selling_price" class="form-control form-control-sm">
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label for="">Quantity</label>
                                    <input type="number" name="quantity" class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-md-2">
                                    <label for="">Tranding</label>
                                    <input type="checkbox" name="trending" style="width:30px;height:30px">
                                </div>
                                <div class="mb-3 col-md-2">
                                    <label for="">Status</label>
                                    <input type="checkbox" name="status" style="width:30px;height:30px">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade border p-3" id="image-tab-pane" role="tabpanel"
                            aria-labelledby="details-tab" tabindex="0">
                            <div class="mb-3">
                                <label for="">Upload Product Image</label>
                                <input type="file" multiple name="image[]" class="form-control form-control-sm">
                            </div>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection