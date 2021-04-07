<?php

namespace Database\Factories;

use App\Models\RequirementMapping;
use Illuminate\Database\Eloquent\Factories\Factory;

class RequirementMappingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RequirementMapping::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'stride_category' => $this->faker->word,
            'ciaaa_category'  => $this->faker->word,
            'requirement'     => $this->faker->sentence(40),
            'keywords'        => $this->faker->text(250),
        ];
    }
}
