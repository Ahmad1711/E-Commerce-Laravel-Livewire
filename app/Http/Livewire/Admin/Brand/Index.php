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

    public function render()
    {
        $brands = Brand::orderby('id', 'desc')->paginate(10);
        return view('livewire.admin.brand.index', ['brands' => $brands]);
    }
}
