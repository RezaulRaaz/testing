<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Event;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TicketInfo>
 */
class TicketInfoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ticketName' => $this->faker->name(),
            'ticketPrefix' => $this->faker->randomNumber(),
            'ticketPrice' => $this->faker->numberBetween(100, 1000),
            'ticketStock' => $this->faker->numberBetween(10, 100),
            'ticketFacilities' => $this->faker->text(),
            'ticketImage' => $this->faker->imageUrl(),
            'event_id' => Event::factory()
        ];
    }
}
