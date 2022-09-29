<div>
    <!-- Modal -->
    @include('livewire.admin.brand.modals.store-modal')
    @include('livewire.admin.brand.modals.edit-modal')
    @include('livewire.admin.brand.modals.delete-modal')
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
                            <td>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#editmodal" wire:click='edit({{$brand->id}})'
                                    class="btn btn-success">Edit</a>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#deletemodal"
                                    wire:click='delete({{$brand->id}})' class="btn btn-danger">Delete</a>
                            </td>
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
            $('#editmodal').modal('hide');
            $('#deletemodal').modal('hide');
        })
</script>
@endpush