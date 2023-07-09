<?php

namespace Database\Factories;

use Faker\Factory as Faker;
use App\Models\Website;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Website>
 */
class WebsiteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Website::class;

    public function definition()
    {
        $faker = Faker::create();
        return [
            'websitename'=>$faker->company,
            'siteurl'=>$faker->url,
            'shortdescription'=>$faker->sentence
        ];
    }
}
