<?php

namespace Database\Factories;

use App\Models\DataCategory;
use App\Models\DataClient;
use Illuminate\Database\Eloquent\Factories\Factory;

class DataClientFactory extends Factory
{
    protected $model = DataClient::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'address' => $this->faker->address,
            'phone' => $this->faker->phoneNumber,
            'data_category_id' => DataCategory::factory()->create()->id,
        ];
    }
}
