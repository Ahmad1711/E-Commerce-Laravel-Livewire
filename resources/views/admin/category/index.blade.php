@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="card">
            <div class="card-header">
                <h3>Categories
                    <a href="{{route('admin.category.create')}}" class="btn btn-primary btn-sm text-white float-end">Add Category</a>
                </h3>
            </div>
            <div class="card-body">

            </div>
        </div>
    </div>
</div>
@endsection