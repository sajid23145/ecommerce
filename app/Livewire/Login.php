<?php

namespace App\Livewire;

use App\Services\ProductService;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Title;

class Login extends Component
{
    public $email;
    public $password;


     protected $productservice;

    public function boot(ProductService $productService)
    {
$this->productservice=$productService;
    }
    public function submit(){
        $this->validate([
            'email'=>'required|email',
            'password'=>'required',

        ]);
        $result=$this->productservice->submitlogin($this->email,$this->password);

        if ($result['success'] && $result['role']==='user') {

            session()->flash('message', $result['message']);

            return redirect()->route('product.list');

        }elseif ($result['success'] && $result['role']==='admin') {

             session()->flash('message', $result['message']);

            return redirect(url('/admin'));

        }else{

            session()->flash('message',$result['message']);
    return redirect()->back();
        }

    }
    #[title('login-page')]

    public function render()
    {
        return view('livewire.login');
    }
}
