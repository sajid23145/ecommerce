<?php

namespace App\Livewire;

use App\Models\product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Title;


class Productlist extends Component
{
    public $searchterm='';

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
        $product=product::where('status','available')->where('title','like','%'.$this->searchterm.'%')->get();
        return view('livewire.productlist',compact('product'));
    }
}
