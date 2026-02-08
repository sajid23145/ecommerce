<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class categorycontroller extends Controller {
    /**
    * Display a listing of the resource.
    */

    public function index() {
        $categories = category::latest()->paginate( 10 );
        return view( 'categories.index', compact( 'categories' ) );
    }

    /**
    * Show the form for creating a new resource.
    */

    public function create() {
        return view( 'categories.create' );

    }

    /**
    * Store a newly created resource in storage.
    */

    public function store( Request $request ) {
        $request->validate( [
            'name' => 'required|string|max:255|unique:categories,name'
        ] );

        Category::create( [
            'name' => $request->name,
        ] );

        return redirect()->route( 'categories.index' )->with( 'success', 'Category created successfully.' );
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

    public function edit( category $category ) {
        return view( 'categories.edit', compact( 'category' ) );

    }

    /**
    * Update the specified resource in storage.
    */

    public function update( Request $request, category $category ) {
        $request->validate( [
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id
        ] );

        $category->update( [
            'name' => $request->name,
        ] );

        return redirect()->route( 'categories.index' )->with( 'success', 'Category updated successfully.' );
    }

    /**
    * Remove the specified resource from storage.
    */

    public function destroy( Category $category ) {
        // 🔥 Prevent delete if posts exist
        if ( $category->posts()->exists() ) {
            return redirect()->route( 'categories.index' )
            ->with( 'error', 'Category cannot be deleted because it has posts.' );
        }

        $category->delete();

        return redirect()->route( 'categories.index' )->with( 'success', 'Category deleted successfully.' );
    }

    public function logout() {
        Auth::logout();
        return redirect( '/' );
    }
}
