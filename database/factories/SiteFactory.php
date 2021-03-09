<?php

namespace Database\Factories;

use App\Models\Site;
use Illuminate\Database\Eloquent\Factories\Factory;

class SiteFactory extends Factory
{
    protected $model = Site::class;

    public function definition()
    {
        return [
            'title' => $this->faker->name,
            'domain' => "http://".$this->faker->word.".com",
            'user_id' => 1,
        ];
    }
}
