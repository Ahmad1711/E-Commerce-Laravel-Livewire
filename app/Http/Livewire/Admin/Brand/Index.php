<?php

namespace App\Http\Livewire\Admin\Brand;

use App\Models\Brand;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $name, $status;
    public $brand_id;
    public function rules()
    {
        return [
            'name' => 'required',
        ];
    }

    public function resetinput()
    {
        $this->name = NULL;
        $this->status = NULL;
        $this->brand_id=NULL;
    }

    public function store()
    {
        $this->validate();
        Brand::create([
            'name' => $this->name,
            'slug' => Str::slug($this->name),
            'status' => $this->status,
        ]);
        session()->flash('success', 'Brand Added successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetinput();
    }

    public function edit($brand_id)
    {
        $this->brand_id = $brand_id;
        $brand = Brand::find($brand_id);
        $this->name = $brand->name;
        $this->status = $brand->status;
    }
    public function update()
    {
        $this->validate();
        Brand::find($this->brand_id)->update([
            'name' => $this->name,
            'slug' => Str::slug($this->name),
            'status' => $this->status,
        ]);
        session()->flash('success', 'Brand Update successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetinput();
    }
    public function delete($brand_id)
    {
        $this->brand_id = $brand_id;
    }
    public function destroy(){
        $brand=Brand::find($this->brand_id);
        $brand->delete();
        session()->flash('success','Brand delete successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetinput();
    }
    public function render()
    {
        $brands = Brand::orderby('id', 'desc')->paginate(10);
        return view('livewire.admin.brand.index', ['brands' => $brands]);
    }
}
