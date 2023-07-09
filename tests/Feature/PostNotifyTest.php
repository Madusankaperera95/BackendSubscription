<?php

namespace Tests\Feature;

use App\Console\Commands\SendNewPostEmail;
use App\Models\Subscriber;
use App\Models\Website;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class PostNotifyTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */


    public function test_CreatePost()
    {

        Storage::fake('uploads');

        $website =Website::create([
            'websitename'=>'yahoo.com',
            'siteurl' =>'https://www.yahoo.com/',
            'shortdescription' =>'Yahoo is a Search engine Media Website'
        ]);

        $website->subscribers()->create(['email'=>'karan@gmail.com']);


        $image=UploadedFile::fake()->image('test-image.jpg');


        $requestData = [
            'authorName' => 'John Doe',
            'postDescription' => 'Test post description',
            'postTitle' => 'Test post title',
            'publishDate' => '2023-07-08',
            'websiteSelect' => $website->id,
            'imageUpload' => UploadedFile::fake()->image('test-image.jpg')
        ];

        // Make a POST request to the store endpoint
        $response = $this->postJson('/api/createpost', $requestData);

        // Assert response status and content
        $response->assertStatus(200)
            ->assertSee("New Post Created");


        $this->assertDatabaseHas('posts', [
            'authorname' => 'John Doe',
            'title' => 'Test post title',
            'description' => 'Test post description'

        ]);




    }
}
