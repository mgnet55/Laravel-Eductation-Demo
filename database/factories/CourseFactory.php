<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name(),
            'description'=>'desctest',
            'duration'=>5.0,
            'image'=>'https://dummyimage.com/800x494/000/fff&text=course+image',
            'teacher_id'=>$this->faker->randomElement([1,2,3,4,5]),
            'category_id'=>$this->faker->randomElement([1,2,3,4,5]),
        ];
    }
}
