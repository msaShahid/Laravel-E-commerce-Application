<div class="row">

    @include('livewire.admin.brand.modal-form')

    <div class="col-md-12">

        @if(session('message'))
        <div class="alert alert-success col-md-6 alert-dismissible fade show" role="alert">
            <strong>Success!</strong> {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="card">
            <div class="card-header">
                <h3>Brand List

                    <a href="#" class="btn btn-primary btn-sm float-end" data-bs-toggle="modal"
                        data-bs-target="#addBrandModal">Add Brand</a>
                    <input type="search" wire:model="search"
                        class="form-control border border-2 rounded-pill  float-end mx-2"
                        placeholder="Type here to search" style="width:250px">
                </h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($brands as $brand)

                        <tr>
                            <td>{{ $brand->id }}</td>
                            <td>{{ $brand->name }}</td>
                            <td>{{ $brand->slug }}</td>
                            <td>{{ $brand->status == '1' ? 'Hidden':'Visible' }}</td>
                            <td>
                                <a href="#" wire:click="editBrand({{ $brand->id }})" data-bs-toggle="modal" data-bs-target="#updateBrandModal"
                                    class="btn btn-success btn-sm">Edit</a>
                                <a href="#" wire:click="deleteBrand({{ $brand->id }})" data-bs-toggle="modal" data-bs-target="#deleteBrandModal"
                                    class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5">No brands found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="mt-2 float-end">
                    {{ $brands->links(); }}
                </div>

            </div>
        </div>
    </div>
</div>

@push('script')

<script>
window.addEventListener('close-modal', event => {

    $('#addBrandModal').modal('hide');
    $('#updateBrandModal').modal('hide');
    $('#deleteBrandModal').modal('hide');

});
</script>

@endpush