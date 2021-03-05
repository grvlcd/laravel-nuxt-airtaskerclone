<?php

namespace Database\Factories;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Profile::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */

    // $table->foreignId('user_id')->constrained()->onDelete('CASCADE');
    // $table->string('birthday');
    // $table->tinyInteger('age')->unsigned();
    // $table->string('bio');
    // $table->enum('gender', ['male', 'female']);
    public function definition()
    {
        return [
            'age' => $this->faker->numberBetween(18, 50),
            'birthday' => $this->faker->dateTimeBetween($startDate = '-30 years', $endDate = 'now'),
            'bio' => $this->faker->sentence(3), 
            'gender' => $this->faker->randomElement(['male', 'female']),
        ];
    }
}
