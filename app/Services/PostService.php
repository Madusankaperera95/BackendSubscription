<?php

namespace App\Services;

use App\Console\Commands\SendNewPostEmail;
use App\Models\Website;

class PostService
{

    public function createPost($request)
    {
        $imageName = time().'.'.$request->imageUpload->extension();
        $request->imageUpload->move(public_path('images'), $imageName);

        $website = Website::where('id',$request->websiteSelect)->first();
        $post = $website->posts()->create([
            'authorname' => $request->authorName,
            'published_date' => $request->publishDate,
            'image' => $imageName,
            'title' => $request->postTitle,
            'description' => $request->postDescription
        ]);

        dispatch(new SendNewPostEmail($post));

        return $post;
    }

}
