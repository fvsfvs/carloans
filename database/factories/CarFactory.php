<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Brand;
use App\Models\CarModel;

class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'model_id' => CarModel::inRandomOrder()->first()->id,
            'photo' => Str::random(10),
            'price' => mt_rand(1000000, 20000000)
        ];
    }

}
