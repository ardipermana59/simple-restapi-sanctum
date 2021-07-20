<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Student::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        $gender = ['male','female'];
        $hobbies = ['Reading', 'Writing', 'Painting','Swimming','Singing','Dancing'];
        $gen = rand(0,1);
        $hobby = rand(0,5);
            return [
                'name' => $this->faker->name($gender[$gen]),
                'gender' => $gender[$gen],
                'phone' => "0873315" . rand(19999,99999),
                'hobby' => $hobbies[$hobby], // password
                'address' => $this->faker->address(),
            ];
    }
}
