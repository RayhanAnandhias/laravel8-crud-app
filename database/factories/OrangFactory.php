<?php

namespace Database\Factories;

use App\Models\OrangModel;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class OrangModelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OrangModel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->name,
            'alamat' => $this->faker->address
        ];
    }
}
