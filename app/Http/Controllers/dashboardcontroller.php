<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class dashboardcontroller extends Controller {
    /**
    * Display a listing of the resource.
    */

    public function index() {

        // Admin Stats
        if ( Auth::user()->role === 'admin' ) {
            $totalUsers = User::count();
            $totalPosts = Post::count();
            $totalCategories = Category::count();
            $latestPosts = Post::with( 'user', 'category' )->latest()->take( 5 )->get();

            return view( 'admin.dashboard', compact(
                'totalUsers',
                'totalPosts',
                'totalCategories',
                'latestPosts'
            ) );
        }

        // User Stats
        if ( Auth::user()->role === 'user' ) {
            $myPostsCount = Post::where( 'user_id', Auth::user()->id )->count();
            $myLatestPosts = Post::with( 'category' )
            ->where( 'user_id', Auth::user()->id )
            ->latest()
            ->take( 5 )
            ->get();

            return view( 'user.dashboard', compact(
                'myPostsCount',
                'myLatestPosts'
            ) );
        }
    }

    /**
    * Show the form for creating a new resource.
    */

    public function create() {
        //
    }

    /**
    * Store a newly created resource in storage.
    */

    public function store( Request $request ) {
        //
    }

    /**
    * Display the specified resource.
    */

    public function show( string $id ) {
        //
    }

    /**
    * Show the form for editing the specified resource.
    */

    public function edit( string $id ) {
        //
    }

    /**
    * Update the specified resource in storage.
    */

    public function update( Request $request, string $id ) {
        //
    }

    /**
    * Remove the specified resource from storage.
    */

    public function destroy( string $id ) {
        //
    }
}
