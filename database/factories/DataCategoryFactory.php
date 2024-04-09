<?php

namespace Database\Factories;

use App\Models\DataCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class DataCategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DataCategory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
            'user_id' => User::factory(),
        ];
    }
}

