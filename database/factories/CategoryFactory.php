<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use App\Models\MainShop;
use Illuminate\Support\Str;
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->name;
        $slg = Str::slug($name);
        return [
            'mainshop_id'=> function(){
                return Mainshop::get()->random();
            },
            'name'=> $name,
            'image'=> $this->faker->image(public_path('/images/category/'), 640, 480,null, false),
            'icon'=> $this->faker->image(public_path('/images/category/'), 40, 40,null, false),
            'slg'=> $slg,
        ];
    }
}
