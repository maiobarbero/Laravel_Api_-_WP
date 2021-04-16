<?php

namespace Database\Factories;

use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Item::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $type = array("cinema","teatro","sport");
        $i = rand(0,2);
   
            return [
                'name' => $this->faker->name,
                'type' => $type[$i],
                'description' => $this->faker->text($maxNbChars = 200),
                'poster' => 'https://picsum.photos/600/400',
                'date' => $this->faker->dateTime
                
            ];
        
    }
}