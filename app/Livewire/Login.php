<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Title;

class Login extends Component
{
    public $email;
    public $password;

    public function submit(){
        $this->validate([
            'email'=>'required|email',
            'password'=>'required',

        ]);
        if (Auth::attempt(['email'=>$this->email,'password'=>$this->password]) && Auth::user()->role=='user') {

            session()->flash('message', 'you are login successfully');

            return redirect()->route('product.list');

        }elseif (Auth::attempt(['email'=>$this->email,'password'=>$this->password]) && Auth::user()->role=='admin') {

            session()->flash('message', 'hello admin you login successfully');


            return redirect(url('/admin'));

        }else{

            session()->flash('message','please first register');
    return redirect()->back();
        }
    }
    #[title('login-page')]

    public function render()
    {
        return view('livewire.login');
    }
}
