<?php

namespace App\Livewire;

use App\Mail\NewOrderMail;
use App\Models\order;
use App\Models\product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Livewire\Attributes\Title;


class Submitorder extends Component
{
    public $product_id;
    public $price;

    public $name;
    public $email;
    public $phonenumber;
    public $address;




    public $id;
    public $product;
    public function mount($id){
        $this->id=$id;
        $this->product=product::find($id);
        $this->product_id = $this->product->id;
        $this->price = $this->product->price;

    }
    public function submit(){
        $this->validate([
            'name'=>'required',
            'email'=>'required|email',
            'phonenumber'=>'required|numeric',
            'address'=>'required',
        ]);
        $order=order::create([
            'user_id'=>Auth::id(),
            'product_id'=>$this->product_id,
            'price'=>$this->price,
            'name'=>$this->name,
            'email'=>$this->email,
            'phonenumber'=>$this->phonenumber,
            'address'=>$this->address,
            'paymont_method'=>'contact',
        ]);
        $order->load('product');

        Mail::to($this->email)->send(new NewOrderMail($order));

        session()->flash('message', 'Order placed successfully! Our team will contact you.');
        return redirect('/');
    }
    public function logout(){
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        return redirect('/login');

        }
        #[title('submitorder-page')]

    public function render()
    {
        $product=$this->product;
        return view('livewire.submitorder',compact('product'));
    }
}
