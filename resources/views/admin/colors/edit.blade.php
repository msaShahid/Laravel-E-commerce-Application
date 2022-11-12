@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Colors Section
                    <a href="{{ url('admin/colors') }}" class="btn btn-dark btn-sm float-end">Back</a>
                </h3>
            </div>
            <div class="card-body">
                <form action="{{ url('admin/colors/'.$colors->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane"
                                aria-selected="true">Home</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade border p-3 show active" id="home-tab-pane" role="tabpanel"
                            aria-labelledby="home-tab" tabindex="0">
                                <div class="col-md-6 form-group">
                                    <label for="">Color Name</label>
                                    <input type="text" name="name" value="{{ $colors->name }}" class="form-control form-control-sm"
                                        placeholder="Enter Color Name" />
                                    @error('name') <samll class="text-danger">{{ $message }}</samll> @enderror
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="">Color Code</label>
                                    <input type="text" name="code" value="{{ $colors->code }}"  class="form-control form-control-sm"
                                        placeholder="Enter Color code">
                                    @error('slug') <samll class="text-danger">{{ $message }}</samll> @enderror
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="" class="me-3">Status</label>
                                    <input type="checkbox" name="status" {{ $colors->status == '1' ? 'checked' : '' }} style="width:30px; height:30px;" />                                    
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