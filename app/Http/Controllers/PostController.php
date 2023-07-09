<?php

namespace App\Http\Controllers;

use App\Console\Commands\SendNewPostEmail;
use App\Events\PostCreated;
use App\Models\Post;
use App\Models\Website;
use Illuminate\Http\Request;
use App\Services\PostService;

class PostController extends Controller
{
    //
    private $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function store(Request $request){
        $request->validate([
           'authorName'=>'required|string',
           'postDescription'=>'required|string',
           'postTitle'=>'required|string',
            'publishDate'=>'required|date',
            'websiteSelect'=>'required',
            'imageUpload'=>'required|image'
        ]);
        $post = $this->postService->createPost($request);
        return response()->json('New Post Created', 200);

    }
}
