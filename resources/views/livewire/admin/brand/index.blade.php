<div>
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="addmodal" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Add Brand</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit.prevent="store">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label>Name</label>
                            <input type="text" wire:model.defer="name" class="form-control">
                            @error('name')<small class="text-danger">{{$message}}</small>@enderror
                        </div>
                        <div class="mb-3">
                            <label>Status</label><br />
                            Active <input type="checkbox" wire:model.defer="status" value="1">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin">
            @if(session()->has('success'))
            <div class="alert alert-success">{{session('success')}}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3>Brand List
                        <a href="#" data-bs-toggle="modal" data-bs-target="#addmodal"
                            class="btn btn-primary btn-sm text-white float-end">Add
                            Brand</a>
                    </h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Slug</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($brands as $brand)
                            <tr>
                            <td>{{$brand->id}}</td>
                            <td>{{$brand->name}}</td>
                            <td>{{$brand->status==1 ? 'Active':'Disable'}}</td>
                            <td>{{$brand->slug}}</td>
                            {{-- <td>
                                <a href="{{route('admin.category.edit',['category'=>$category->id])}}"
                                    class="btn btn-success">Edit</a>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#deletemodal"
                                    wire:click='delete({{$category->id}})' class="btn btn-danger">Delete</a>
                            </td> --}}
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center mt-3">
                        {{$brands->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
    window.addEventListener('close-modal', event => {
            $('#addmodal').modal('hide');
        })
</script>
@endpush