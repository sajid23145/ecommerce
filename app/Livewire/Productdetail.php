<?php

namespace App\Livewire;

use App\Models\product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Title;


class Productdetail extends Component
{
    public $id;
    public $product;

    public function mount($id){
$this->id=$id;
$this->product=product::find($id);

}
#[title('productdetail')]

public function logout(){
Auth::logout();
session()->invalidate();
    session()->regenerateToken();
    return redirect('/login');
}
    public function render()
    {
        $products=$this->product;

        return view('livewire.productdetail',compact('products'));
    }
}
