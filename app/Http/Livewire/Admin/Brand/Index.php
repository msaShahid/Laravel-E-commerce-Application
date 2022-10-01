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
    public $search = '';

    public $name, $slug, $status, $brand_id;

    public function rules(){
        return [
            'name' => 'required|string',
            'slug' => 'required|string',
            'status' => 'nullable'
        ];
    }


    public function resetInput(){
        $this->name = NULL;
        $this->slug = NULL;
        $this->status = NULL;
        $this->brand_id = NULL;
    }

    // Insert Data 
    public function storeBrand(){

        $validatedData = $this->validate();
        Brand::create([
            'name' => $this->name,
            'slug' => Str::slug($this->slug),
            'status' => $this->status == true ? '1':'0',
        ]);
        session()->flash('message','Brand Add Successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }

    // Update Data -- get data on form
    public function editBrand(int $brand_id){

        $this->brand_id = $brand_id;
        $brand = Brand::findOrFail($brand_id);
        $this->name = $brand->name;
        $this->slug = $brand->slug;
        $this->status = $brand->status;

    }
    // Update Data here
    public function updateBrand(){

        $validatedData = $this->validate();
        Brand::findOrfail($this->brand_id)->update([
            'name' => $this->name,
            'slug' => Str::slug($this->slug),
            'status' => $this->status == true ? '1':'0',
        ]);
        session()->flash('message','Brand Updated Successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();

    }

    // Reset Modal form
    public function closeModal(){
        $this->resetInput();
    }

    public function openModal(){
        $this->resetInput();
    }

    // Delete Data -- get id from from
    public function deleteBrand($brand_id){

        $this->brand_id = $brand_id;
    }
    // Delete data here
    public function destroyBrand(){

        Brand::findOrFail($this->brand_id)->delete();
        session()->flash('message','Brand Delete Successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }

    // Retrive Data
    public function render()
    {
        $brands = Brand::where('name', 'like', '%'.$this->search.'%')->orderby('id','DESC')->paginate(10);
        return view('livewire.admin.brand.index',['brands' => $brands])
                    ->extends('layouts.admin')
                    ->section('content');
        
    }


    
}
