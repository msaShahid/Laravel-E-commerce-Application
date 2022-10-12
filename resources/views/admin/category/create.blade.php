@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Category
                    <a href="{{ url('admin/category') }}" class="btn btn-dark btn-sm float-end">Back</a>
                </h3>
            </div>
            <div class="card-body">
                <form action="{{ url('admin/category') }}" method="POST" enctype="multipart/form-data">
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
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade border p-3 show active" id="home-tab-pane" role="tabpanel"
                            aria-labelledby="home-tab" tabindex="0">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="">Name</label>
                                    <input type="text" name="name" class="form-control form-control-sm"
                                        placeholder="Enter Category Name" />
                                    @error('name') <samll class="text-danger">{{ $message }}</samll> @enderror
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="">Slug</label>
                                    <input type="text" name="slug" class="form-control form-control-sm"
                                        placeholder="Enter Category Slug">
                                    @error('slug') <samll class="text-danger">{{ $message }}</samll> @enderror
                                </div>

                                <div class="col-md-12 form-group">
                                    <label for="">Description</label>
                                    <textarea type="text" name="description" class="form-control form-control-sm"
                                        placeholder="Enter Category Description...." rows="3"></textarea>
                                    @error('description') <samll class="text-danger">{{ $message }}</samll> @enderror
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="">Image</label>
                                    <input type="file" name="image" class="form-control form-control-sm"
                                        placeholder="Upload Category Image">
                                    @error('image') <samll class="text-danger">{{ $message }}</samll> @enderror
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="">Status</label></br>
                                    <input type="checkbox" name="status" />
                                    <!-- @error('status') <samll class="text-danger">{{ $message }}</samll> @enderror -->
                                </div>
                            </div>

                        </div>
                        <div class="tab-pane fade border p-3" id="seotag-tab-pane" role="tabpanel"
                            aria-labelledby="seotag-tab" tabindex="0">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="">Meta title</label>
                                    <input type="text" name="meta_title" class="form-control form-control-sm"
                                        placeholder="Enter Category Meta Title">
                                    @error('meta_title') <samll class="text-danger">{{ $message }}</samll> @enderror
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="">Meta Keyword</label>
                                    <input type="text" name="meta_keyword" class="form-control form-control-sm"
                                        placeholder="Enter Category Meta Keyword">
                                    @error('meta_keyword') <samll class="text-danger">{{ $message }}</samll> @enderror
                                </div>
                                <div class="col-md-12 form-group">
                                    <label for="">Meta Description</label>
                                    <textarea type="text" name="meta_description" class="form-control form-control-sm"
                                        rows="3" placeholder="Enter Category Meta Description"></textarea>
                                    @error('meta_description') <samll class="text-danger">{{ $message }}</samll>
                                    @enderror
                                </div>
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