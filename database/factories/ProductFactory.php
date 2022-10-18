<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $cost = $this->faker->randomFloat(2,0,1000); ///precio de compra para nosotros
        $price1 = $cost * 1.30; ///precio de venta + 30% de ganancia
        $price2 = $price1 - ($price1 * 0.05); //precio de mayoreo o especial
        $stock = $this->faker->numberBetween(0,500);
        return [

            'category_id' => Category::all()->random()->id,
            'name'=>$this->faker->word(5),
            'code'=>$this->faker->unique()->ean13(),
            'changes'=>'',
            'cost'=>$cost,
            'price'=>$price1,
            'price2'=>$price2,
            'stock'=>$stock,
            'minstock'=>$this->faker->randomElement([5,10,15,20,25])

        ];
    }
}
