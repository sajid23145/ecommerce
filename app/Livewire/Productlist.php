<?php

namespace App\Livewire;

use App\Models\product;
use App\Services\ProductService;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Title;


class Productlist extends Component
{
    public $searchterm='';

    protected $productservice;

    public function boot(ProductService $productService)
    {
$this->productservice=$productService;
    }
    public function search(){

    }


    public function logout(){
        Auth::logout();
        session()->invalidate();
            session()->regenerateToken();
            return redirect('/login');
        }
    #[title('productlist')]
        public function render()
    {
        $product=$this->productservice->getAll($this->searchterm);
        return view('livewire.productlist',compact('product'));
    }
}
