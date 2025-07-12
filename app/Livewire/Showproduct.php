<?php

namespace App\Livewire;

use App\Models\product;
use App\Models\User;
use App\Services\ProductService;
use Livewire\Component;
use Livewire\Attributes\Title;

class Showproduct extends Component
{
    public $id;

     protected $productservice;

    public function boot(ProductService $productService)
    {
$this->productservice=$productService;
    }
public function delete($id){
    $product=$this->productservice->getbyid($id);
    $product->delete();

    session()->flash('message','product deleted successfully');
    return redirect(url('/showproduct'));
}
#[title('productshow-page')]

    public function render()
    {
        $product=$this->productservice->get();
        return view('livewire.showproduct',compact('product'));
    }


}
