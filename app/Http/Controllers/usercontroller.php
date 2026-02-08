<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class usercontroller extends Controller {
    public function index() {
        return view( 'register' );
    }

    public function create( request $request ) {

        $user = User::create( [
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password,
        ] );
        return redirect( '/' );
    }

    public function login( request $request ) {
        $credentials = $request->validate( [
            'email'=>'required|email',
            'password'=>'required'
        ] );
        if ( Auth::attempt( $credentials ) ) {
            $request->session()->regenerate();

            if ( Auth::user()->role == 'admin' ) {

                return redirect()->route( 'admin.dashboard' );
            }
            if ( auth::user()->role == 'user' ) {
                return redirect()->route( 'user.dashboard' );
            }
            abort( 403, 'Unauthorized Role' );

        }
        return redirect()->route( 'login' )->with( 'message', 'you cant login,please register first' );

    }
}
