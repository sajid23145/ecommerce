<?php

namespace App\Livewire;

use App\Models\product;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\WithFileUploads;


class Addproduct extends Component
{
    use WithFileUploads;

    public $title;
    public $description;
    public $price;
    public $image;
    public $status;




    public function submit(){

        $this->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'required|image|max:3000|mimes:png,jpg,jpeg',
        ]);
        $extension=time(). "." .$this->image->getClientOriginalExtension();
        $this->image->storeAs('images', $extension, 'public');
        // $imagePath = $this->image->store('products','public');
        product::create([
            'title'=>$this->title,
            'description'=>$this->description,
            'price'=>$this->price,
            'status'=>$this->status,
            'image'=>$extension,
        ]);
        session()->flash('message','product created successfuly');
        return redirect(url('/showproduct'));
    }
    #[title('product-add')]

    public function render()
    {
        return view('livewire.addproduct');
    }
}
