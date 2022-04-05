<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Property;

/**
 * @extends Factory
 */
class PropertyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Property::class;


    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence($nbWords = 4, $variableNbWords = true),
            'description' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
            'price' => $this->faker->numberBetween(70, 400). '000',
            'address' => $this->faker->address,
            'surface' => $this->faker->numberBetween(20, 200),
            'image' => 'https://i.imgur.com/rBVJnRk.png',
            'type_id' => $this->faker->numberBetween(1, 3),
        ];
    }
}
