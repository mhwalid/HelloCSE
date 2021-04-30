<?php

namespace Database\Factories;

use App\Models\Start;
use Illuminate\Database\Eloquent\Factories\Factory;

class StartFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Start::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->paragraph(15),
            'image' => $this->faker->unique()->randomElement(['Star1.jpg', 'Star2.jpg', 'Star3.jpg', 'Star4.jpg', 'Star5.jpg']),
        ];
    }
}
