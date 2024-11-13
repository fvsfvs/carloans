<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Brand;

class CarModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $this->faker->addProvider(new \Faker\Provider\Fakecar($this->faker));
        $vehicle = $this->faker->vehicleArray();
        return [
            'name' => $vehicle['model'],
            'brand_id' => Brand::inRandomOrder()->first()->id,
        ];
    }

}
