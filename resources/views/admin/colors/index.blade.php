@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        @if(session('message'))
        <div class="alert alert-success col-md-6 alert-dismissible fade show" role="alert">
            <strong>Success !</strong> {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="card">
            <div class="card-header">
                <h3>Colors Section
                    <a href="{{ url('admin/colors/createCol') }}" class="btn btn-primary btn-md float-end">Add Color</a>
                </h3>
            </div>
            <div class="card-body">
            <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Code</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($colors as $color)
                        <tr>
                            <td>{{ $color->id }}</td>
                            <td>{{ $color->name }}</td>
                            <td>{{ $color->code }}</td>
                            <!-- <td>{{ $color->status == '1' ? 'Hidden':'Visible' }}</td> -->
                            <td>
                                @if($color->status == '0')
                                   <span class="text-success"><i class="mdi icon-lg mdi-toggle-switch"></i></span> 
                                @else
                                <span class="text-danger"><i class="mdi icon-lg mdi-toggle-switch-off"></i></span> 
                                @endif
                            </td>
                            <td>
                            <a href="{{ url('admin/colors/'.$color->id.'/edit') }}" class="btn btn-success btn-sm">Edit</a>
                                <a href="{{ url('admin/colors/'.$color->id.'/delete') }}" onclick="return confirm('Are you sure want to delete this ?')" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5">No Color Found</td>
                        </tr>
                        @endforelse
                    </tbody>

                </table>

            </div>
        </div>
    </div>
</div>

@endsection