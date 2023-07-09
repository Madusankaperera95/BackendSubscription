<?php

namespace Tests\Feature;

use App\Models\Website;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class WebSiteControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_GetAllWebsites()
    {

        $websites = Website::factory()->count(3)->create();

        $response = $this->getJson('/api/websites');

        // Assert response status
        $response->assertOk();

        // Assert that the response content matches the expected websites
        $response->assertExactJson($websites->toArray());
    }

    public function test_Subscription()
    {

        $website = Website::factory()->create();

        $requestData = [
            'email_address' => 'hello@yopmail.com',

        ];

        // Make a POST request to the store endpoint
        $response = $this->postJson("api/website/$website->id/subscribe", $requestData);

        // Assert response status and content
        $response->assertStatus(200)
            ->assertSee("Subscription created successfully.");
    }
}
