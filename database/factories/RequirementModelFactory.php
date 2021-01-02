<?php

namespace Database\Factories;
use App\Models\User;
use App\Models\RequirementModel;
//use Faker\Factory as FakerFactory;
use Illuminate\Database\Eloquent\Factories\Factory;

class RequirementModelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RequirementModel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //'user_id' => User::class,
            'stride_category' => $this->faker->word,
            'title' => $this->faker->sentence,
            'description' => $this->faker->text,
            'mitigations' => $this->faker->text,
            'priority' => $this->faker->randomDigitNot(5),
            'state' => $this->faker->boolean,    
        ];
    }
}
