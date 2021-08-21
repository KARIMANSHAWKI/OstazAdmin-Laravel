<?php

namespace Database\Factories;

use App\Models\Message;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Faker\Generator as Faker;


class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $factory = new Factory();

        $factory->define(Message::class, function (Faker $faker) {
            do {
                $from = rand(1, 10);
                $to = rand(1, 10);
                $is_read = rand(0, 1);
            } while ($from === $to);

            return [
                'from' => $from,
                'to' => $to,
                'message' => $faker->sentence,
                'is_read' => $is_read
            ];
        });
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
