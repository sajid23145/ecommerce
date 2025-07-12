<?php

namespace App\Repositories;

use App\Models\order;
use App\Models\product;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;

class ProductRepository
{
    public function all($searchterm)
    {
        $product=product::where('status','available')->where('title','like','%'.$searchterm.'%')->get();
return $product;
    }

     public function get()
    {
        $product=product::all( );
        return $product;
    }

    public function create(array $data)
    {
        $user=User::create( $data);
        return $user;
    }
    public function find($id)
    {
        $product=product::find($id);
        return $product;
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
public function update($product,$title,$description,$price,$status,$image,$oldimage){

      $products=$product;
        $products->title=$title;
        $products->description=$description;
        $products->price=$price;
        $products->status=$status;

        $products->image=$oldimage;


        if ($image instanceof UploadedFile) {
            $extension=time(). "." .$image->getClientOriginalExtension();
            $image->storeAs('images', $extension, 'public');
            $products->image = str_replace('public/storage/images', '', $extension);

        }else {
            // Keep the old image
            $products->image = $oldimage; // or whatever your existing value is
        }

        $products->save();
        return $products;
}

}

