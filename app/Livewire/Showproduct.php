<?php

namespace App\Livewire;

use App\Models\product;
use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Title;

class Showproduct extends Component
{
    public $id;
public function delete($id){
    $product=product::find($id);
    $product->delete();

    session()->flash('message','product deleted successfully');
    return redirect(url('/showproduct'));
}
#[title('productshow-page')]

    public function render()
    {
        $product=product::all();
        return view('livewire.showproduct',compact('product'));
    }


}
