<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\post;
use Illuminate\Http\Request;

class PostApiController extends Controller {
    public function index() {
        $posts = post::with( 'category', 'user' )
        ->latest()->paginate( 10 );
        return PostResource::collection( $posts );
    }

    public function show( post $post ) {
        $post->load( 'category', 'user' );
        return new PostResource( $post );
    }
}
