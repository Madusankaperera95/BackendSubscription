<?php

namespace App\Listeners;

use App\Events\PostCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendNewPostCreatedEmail implements ShouldQueue
{
    use InteractsWithQueue;



    /**
     * Create the event listener.
     *
     * @return void
     */
    public function handle(PostCreated $event)
    {
        // Logic to send email to the registered user
        $post = $event->post;

        Mail::raw($post->description, function ($message) use($post) {
            $message->to('manojmp@yopmail.com')->subject($post->title);
        });
    }


}
