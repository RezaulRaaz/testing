<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\TicketInfo;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'nid' => $this->faker->randomNumber(8),
            'gender' => $this->faker->randomElement(['male', 'female']),
            'email' => $this->faker->email(),
            'phone' => $this->faker->phoneNumber(),
            'date_of_birth' => $this->faker->date(),
            'transaction_id' => $this->faker->uuid(),
            'ticket_no' => $this->faker->randomNumber(),
            'ticket_info_id' => TicketInfo::factory(),
            'status' => $this->faker->randomElement(['pending', 'confirmed', 'cancelled']),
        ];
    }
}
