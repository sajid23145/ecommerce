<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\Attributes\Title;

class Register extends Component
{
    public $name;
    public $email;
    public $phonenumber;

    public $password;


    public function submit(){
        $this->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
            'phonenumber'=>'required|numeric',
            'password'=>'required',
        ]);

        User::create([
            'name'=>$this->name,
            'email'=>$this->email,
            'phonenumber'=>$this->phonenumber,
            'password'=>Hash::make($this->password)
        ]);
        session()->flash('message', 'registered successfully,please login here');

        return redirect(url('/login'));

    }
    #[title('register')]

    public function render()
    {
        return view('livewire.register');
    }
}
