<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $category_id;

    public function delete($category_id){
        $this->category_id=$category_id;
    }
    public function destroy(){
        $category=Category::find($this->category_id);
        $path='uploads/category/'.$category->image;
        if(File::exists($path)){
            File::delete($path);
        }
        $category->delete();
        session()->flash('success','Category delete successfully');
        $this->dispatchBrowserEvent('close-modal');
    }
    public function render()
    {
        $categories = Category::orderby('id', 'desc')->paginate(3);
    
        return view('livewire.admin.category.index',['categories'=>$categories]);
    }
}
