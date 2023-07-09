<?php

namespace App\Console\Commands;

use App\Models\Post;
use App\Models\Website;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendNewPostEmail extends Command implements ShouldQueue
{
    use InteractsWithQueue;
    public $post;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:PostEmail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * @param $website
     */
    public function __construct(Post $post)
    {
        parent::__construct();
        $this->post=$post;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $newpost = $this->post;
        $subscribers = $newpost->website->subscribers()->pluck('email')->toArray();
        $website = $newpost->website;

        foreach ($subscribers as $subscriber) {
            Mail::send('emails.postNotification', ['newpost' => $newpost], function ($message) use ($newpost, $subscriber, $website) {
                $message->to($subscriber)->subject('New Post is generated from the Website ' . $website->websitename);
            });
        }
    }
}
