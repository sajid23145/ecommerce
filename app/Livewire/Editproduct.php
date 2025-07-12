<?php

namespace App\Livewire;

use App\Models\product;
use App\Services\ProductService;
use Illuminate\Http\UploadedFile;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\WithFileUploads;


class Editproduct extends Component
{
    use WithFileUploads;
    public $id;
    public $product;

    public $title,$description,$price,$status,$image,$oldimage;

 protected $productservice;

    public function boot(ProductService $productService)
    {
$this->productservice=$productService;
    }
    public function mount($id){
        $this->id=$id;
        $this->product=$this->productservice->getbyid($this->id);

        if ($this->product) {
            $this->title = $this->product->title;
            $this->description = $this->product->description;
            $this->price = $this->product->price;
            $this->status = $this->product->status;
            $this->image = $this->product->image;
            $this->oldimage = $this->product->image; // Store the old image for reference
        } else {
            abort(404); // If product not found, show 404 error
        }
    }


    #[title('showorder-page')]

    public function render()
    {
        $product=$this->product;

        return view('livewire.editproduct',compact('product'));
    }


    public function update(){

// $this->validate([
//     'title'=>'required',
//     'description'=>'required',
//     'price'=>'required|numeric',
//     'image'=>'required|max:3000|mimes:png,jpg,jpeg',
// ]);
$this->productservice->update($this->product,$this->title,$this->description,$this->price,$this->status,$this->image,$this->oldimage);

        // $products=$this->product;
        // $products->title=$this->title;
        // $products->description=$this->description;
        // $products->price=$this->price;
        // $products->status=$this->status;

        // $products->image=$this->oldimage;


        // if ($this->image instanceof UploadedFile) {
        //     $extension=time(). "." .$this->image->getClientOriginalExtension();
        //     $this->image->storeAs('images', $extension, 'public');
        //     $products->image = str_replace('public/storage/images', '', $extension);

        // }else {
        //     // Keep the old image
        //     $products->image = $this->oldimage; // or whatever your existing value is
        // }

        // $products->save();

        session()->flash('message', 'Product updated successfully');
        return redirect(url('/showproduct'));
    }

}
