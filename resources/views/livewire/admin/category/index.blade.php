<div>
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="deletemodal" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Category Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit.prevent='destroy'>
                    <div class="modal-body">
                        Are You sure you want to delete this category ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Yes</button>
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
                    <h3>Categories
                        <a href="{{route('admin.category.create')}}"
                            class="btn btn-primary btn-sm text-white float-end">Add
                            Category</a>
                    </h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                            <tr>
                                <td>{{$category->id}}</td>
                                <td>{{$category->name}}</td>
                                <td>{{$category->status==1 ? 'Active':'Disable'}}</td>
                                <td>
                                    <a href="{{route('admin.category.edit',['category'=>$category->id])}}"
                                        class="btn btn-success">Edit</a>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#deletemodal"
                                        wire:click='delete({{$category->id}})' class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center mt-3">
                        {{$categories->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
    window.addEventListener('close-modal', event => {
            $('#deletemodal').modal('hide');
        })
</script>
@endpush