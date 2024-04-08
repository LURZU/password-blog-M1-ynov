<?php

namespace Database\Factories;

use App\Models\DataCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            // Si votre modèle DataCategory a un user_id ou d'autres champs, les définir ici également
            // 'user_id' => User::factory(), // Crée un utilisateur et l'associe si c'est nécessaire
        ];
    }
}

