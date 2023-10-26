<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
            return [
                'event_name' => $this->faker->name(),
                'slug' => $this->faker->slug(),
                'location' => $this->faker->address(),
                'location_map' => $this->faker->text(),
                'age_limit' => $this->faker->numberBetween(18, 100),
                'event_date' => $this->faker->dateTimeBetween('+1 day', '+1 month'),
                'terms_and_conditions' => $this->faker->text(),
                'nid' => false,
                'upcoming_event' => true,
                'event_on_hold' => false,
                'banner' => $this->faker->imageUrl(),
                'performers' => json_encode([$this->faker->name(), $this->faker->name()]),
            ];
    }
}
