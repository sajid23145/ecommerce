<?php

namespace App\Repositories;

use App\Models\order;
use App\Models\product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ordershowrepository
{
    public function all()
    {

    }

     public function get()
    {

    }

    public function create($title,$description,$price,$image,$status)
    {
$extension=time(). "." .$image->getClientOriginalExtension();
        $image->storeAs('images', $extension, 'public');
        // $imagePath = $this->image->store('products','public');
        product::create([
            'title'=>$title,
            'description'=>$description,
            'price'=>$price,
            'status'=>$status,
            'image'=>$extension,
        ]);
    }
    public function find($ordid)
    {
        $order=order::find($ordid);
        return $order;
    }

     public function product()
    {
        $product=product::count();
        return $product;
    }
    public function order()
    {
        $order=order::count();
        return $order;
    }
    public function pendingorder()
    {
                $pendingorder=order::where('markorder','pending')->count();
                return $pendingorder;

    }

     public function ordercreate(array $data)
    {
        $order=order::create( $data);
        return $order;
    }

      public function submit($email,$password)
    {
 if (Auth::attempt(['email'=>$email,'password'=>$password]) && Auth::user()->role=='user') {
    return [
        'success'=>true,
        'role'=>'user',
'message'=>'you are login successfully'
    ];



        }elseif (Auth::attempt(['email'=>$email,'password'=>$password]) && Auth::user()->role=='admin') {

            return [
        'success'=>true,
        'role'=>'admin',
'message'=>'hello admin you login successfully'
    ];

        }else {
             return [
        'success'=>false,
        'role'=>'null',
'message'=>'please first register'
    ];
        }
    }
}
