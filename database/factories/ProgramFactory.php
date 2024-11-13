<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Brand;
use App\Models\CarModel;

class ProgramFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->firstNameFemale(),
            'interest_rate' => mt_rand(1200, 3500) / 100,
            'loan_term' => mt_rand(24, 72)
        ];
    }

}