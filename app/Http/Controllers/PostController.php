<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\category;
use App\Models\post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller {
    /**
    * Display a listing of the resource.
    */

    public function index() {
        $posts = post::with( 'category', 'user' )
        ->latest()
        ->paginate( 5 );

        return view( 'posts.index', compact( 'posts' ) );
    }

    /**
    * Show the form for creating a new resource.
    */

    public function create() {
        $categories = category::orderBy( 'name' )->get();
        return view( 'posts.create', compact( 'categories' ) );
    }

    /**
    * Store a newly created resource in storage.
    */

    public function store( StorePostRequest $request ) {
        $data = $request->validated();

        if ( $request->hasFile( 'image' ) ) {
            $data[ 'image' ] = $request->file( 'image' )->store( 'posts', 'public' );
        }

        $data[ 'user_id' ] = Auth::id();

        Post::create( $data );

        return redirect()->route( 'posts.index' )->with( 'success', 'Post created successfully.' );
    }

    /**
    * Display the specified resource.
    */

    public function show( post $post ) {
        $post->load( 'category', 'user' );

        return view( 'posts.show', compact( 'post' ) );
    }

    /**
    * Show the form for editing the specified resource.
    */

    public function edit( post $post ) {
        // user can only edit his own post
        if ( $post->user_id !== Auth::id() ) {
            abort( 403 );
        }

        $categories = Category::orderBy( 'name' )->get();
        return view( 'posts.edit', compact( 'post', 'categories' ) );
    }

    /**
    * Update the specified resource in storage.
    */

    public function update( UpdatePostRequest $request, Post $post ) {
        if ( $post->user_id !== Auth::id() ) {
            abort( 403 );
        }

        $data = $request->validated();

        if ( $request->hasFile( 'image' ) ) {

            if ( $post->image && Storage::disk( 'public' )->exists( $post->image ) ) {
                Storage::disk( 'public' )->delete( $post->image );
            }

            $data[ 'image' ] = $request->file( 'image' )->store( 'posts', 'public' );
        }

        $post->update( $data );

        return redirect()->route( 'posts.index' )->with( 'success', 'Post updated successfully.' );

    }

    /**
    * Remove the specified resource from storage.
    */

    public function destroy( post $post ) {
        if ( $post->user_id !== Auth::id() ) {
            abort( 403 );
        }

        if ( $post->image && Storage::disk( 'public' )->exists( $post->image ) ) {
            Storage::disk( 'public' )->delete( $post->image );
        }

        $post->delete();

        return redirect()->route( 'posts.index' )->with( 'success', 'Post deleted successfully.' );
    }

    public function logout() {
        auth::logout();
        return redirect( '/' );
    }

}
