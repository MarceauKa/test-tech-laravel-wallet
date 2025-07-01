<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\WalletTransfer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<WalletTransfer>
 */
class RecurringTransferFactory extends Factory
{
    public function definition(): array
    {
        return [
            'amount' => fake()->numberBetween(1, 100),
            'frequency_in_days' => fake()->numberBetween(1, 7),
            'started_at' => fake()->date('Y-m-d'),
            'ended_at' => fake()->date('Y-m-d', '+1 month'),
        ];
    }

    public function amount(int $amount): self
    {
        return $this->state(fn (array $attributes) => [
            'amount' => $amount,
        ]);
    }

    public function frequencyInDays(int $value): self
    {
        return $this->state(fn (array $attributes) => [
            'frequency_in_days' => $value,
        ]);
    }
}
