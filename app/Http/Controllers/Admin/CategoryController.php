<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.index');
    }
    public function create()
    {
        return view('admin.category.create');
    }
    public function store(CategoryRequest $request)
    {

        $category=Category::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'slug'=>$request->slug,
            'meta_keyword'=>$request->meta_keyword,
            'meta_title'=>$request->meta_title,
            'meta_description'=>$request->meta_description,
            'status'=>$request->status == true ? '1':'0',
        ]);

      if($request->hasFile('image')){
          $file=$request->file('image');
          $ext=$file->getClientOriginalExtension();
          $filename=time().'.'.$ext;
          $file->move('uploads/category',$filename);
          $category->image='uploads/category/'.$filename;
          $category->save();  
      }

      return redirect()->route('admin.category.index')->with('success','Category added successfully');
    }

    public function edit(Category $category){
        // $category=Category::find($id);
        return view('admin.category.edit',['category'=>$category]);
    }
    public function update(CategoryRequest $request,Category $category)
    {

        $category->update([
            'name'=>$request->name,
            'description'=>$request->description,
            'slug'=>$request->slug,
            'meta_keyword'=>$request->meta_keyword,
            'meta_title'=>$request->meta_title,
            'meta_description'=>$request->meta_description,
            'status'=>$request->status == true ? '1':'0',
        ]);

      if($request->hasFile('image')){
          $path='uploads/category/'.$category->image;
          if(File::exists($path)){
              File::delete($path);
          }
          $file=$request->file('image');
          $ext=$file->getClientOriginalExtension();
          $filename=time().'.'.$ext;
          $file->move('uploads/category',$filename);
          $category->update([
              'image'=>'uploads/category/'.$filename
          ]);  
      }

      return redirect()->route('admin.category.index')->with('success','Category update successfully');
    }
  
}
