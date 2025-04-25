<?php

namespace App\Livewire;

use App\Models\order;
use App\Models\product;
use Livewire\Component;
use Livewire\Attributes\Title;



class Admin extends Component
{
    #[title('dashboard')]

    public function render()
    {
        $product=product::count();
        $order=order::count();
        $pendingorder=order::where('markorder','pending')->count();

        return view('livewire.admin',compact('product','order','pendingorder'));
    }
}
