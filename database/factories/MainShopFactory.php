<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\MainShop;
class MainShopFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'icon' => $this->faker->image(public_path('/images/shop/'), 40, 40,null, false),
            'logo' => $this->faker->image(public_path('/images/shop/'), 120, 40,null, false),
        ];
    }
}
