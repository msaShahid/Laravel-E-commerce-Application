    <!-- Insert Modal -->
    <div wire:ignore.self class="modal fade" id="addBrandModal" tabindex="-1" aria-labelledby="addBrandModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addBrandModalLabel">Create Brand</h5>
                    <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form wire:submit.prevent="storeBrand">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" wire:model.defer="name" class="form-control">
                            @error('name') <samll class="text-danger">{{ $message }}</samll> @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Slug</label>
                            <input type="text" wire:model.defer="slug" class="form-control">
                            @error('slug') <samll class="text-danger">{{ $message }}</samll> @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Status</label>
                            <input type="checkbox" wire:model.defer="status" /> Checked = Hidden, Un-Checked = Visiable
                            @error('status') <samll class="text-danger">{{ $message }}</samll> @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" wire:click="closeModal" class="btn btn-secondary"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Insert Modal -->

    <!-- Update Modal -->
    <div wire:ignore.self class="modal fade" id="updateBrandModal" tabindex="-1" aria-labelledby="updateBrandModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateBrandModalLabel">Edit Brand</h5>
                    <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div wire:loading class="text-center p-2">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden"></span>
                    </div>Loading...
                </div>
                <div wire:loading.remove>
                    <form wire:submit.prevent="updateBrand">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="">Brand Name</label>
                                <input type="text" wire:model.defer="name" class="form-control">
                                @error('name') <samll class="text-danger">{{ $message }}</samll> @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Brand Slug</label>
                                <input type="text" wire:model.defer="slug" class="form-control">
                                @error('slug') <samll class="text-danger">{{ $message }}</samll> @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Status</label>
                                <input type="checkbox" wire:model.defer="status" style="width:30px; height:30px;">
                                <samll> Checked = Hidden, Un-Checked = Visiable </samll>
                                @error('status') <samll class="text-danger">{{ $message }}</samll> @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" wire:click="closeModal"
                                data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Update Modal -->

    <!-- Update Modal -->
    <div wire:ignore.self class="modal fade" id="deleteBrandModal" tabindex="-1" aria-labelledby="deleteBrandModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteBrandModalLabel">Delete Brand</h5>
                    <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form wire:submit.prevent="destroyBrand">
                    <div class="modal-body">
                        <h6>Are sure you want delete this data?</h6>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" wire:click="closeModal"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Yes, Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Update Modal -->