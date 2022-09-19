@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="card">
            <div class="card-header">
                <h3>Update Category
                    <a href="{{route('admin.category.index')}}"
                        class="btn btn-primary btn-sm text-white float-end">Back</a>
                </h3>
            </div>
            <div class="card-body">
                <form action="{{route('admin.category.update',['category'=>$category->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="{{$category->name}}">
                            @error('name')<small class="text-danger">{{$message}}</small>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Slug</label>
                            <input type="text" name="slug" class="form-control" value="{{$category->slug}}">
                            @error('slug')<small class="text-danger">{{$message}}</small>@enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Description</label>
                            <textarea name="description" class="form-control"
                                row="3">{{$category->description}}</textarea>
                            @error('description')<small class="text-danger">{{$message}}</small>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control">
                            <img src="{{asset($category->image)}}" width="50px" height="50px"> 
                            @error('image')<small class="text-danger">{{$message}}</small>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Status</label><br />
                            <input type="checkbox" name="status" {{$category->status==1 ? 'checked':''}}>
                        </div>
                        <div class="col-md-12">
                            <h4>SEO Tags</h4>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Meta Title</label>
                            <input type="text" name="meta_title" class="form-control" value="{{$category->meta_title}}">
                            @error('meta_title')<small class="text-danger">{{$message}}</small>@enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Meta Keyword</label>
                            <textarea name="meta_keyword" class="form-control"
                                row="3">{{$category->meta_keyword}}</textarea>
                            @error('meta_keyword')<small class="text-danger">{{$message}}</small>@enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Meta Description</label>
                            <textarea name="meta_description" class="form-control"
                                row="3">{{$category->meta_description}}</textarea>
                            @error('meta_description')<small class="text-danger">{{$message}}</small>@enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <button type="submit" class="btn btn-primary text-white float-end">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection