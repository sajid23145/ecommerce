<?php

namespace App\Livewire;

use App\Models\order;
use App\Models\product;
use App\Services\ProductService;
use Livewire\Component;
use Livewire\Attributes\Title;



class Admin extends Component
{


     protected $productservice;

    public function boot(ProductService $productService)
    {
$this->productservice=$productService;
    }
    #[title('dashboard')]

    public function render()
    {
        $product=$this->productservice->product();
        $order=$this->productservice->order();
        $pendingorder=$this->productservice->pendingorder();

        return view('livewire.admin',compact('product','order','pendingorder'));
    }
}
