<div>
    <!-- Modal -->
    @include('livewire.admin.category.modals.delete-modal')
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