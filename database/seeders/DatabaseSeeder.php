<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\RecurringTransfer;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Wallet;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $rich = User::factory()->has(Wallet::factory()->richChillGuy())->create([
            'name' => 'Rich Chill Guy',
            'email' => 'rich.chill.guy@test.fr',
        ]);

        $other = User::factory()->has(Wallet::factory())->create([
            'name' => 'Another Guy',
            'email' => 'another.guy@test.fr',
        ]);

        RecurringTransfer::factory()
            ->amount(1000)
            ->frequencyInDays(1)
            ->create([
                'source_id' => $rich->id,
                'recipient_email' => $other->email,
                'reason' => "Because I'm a chill guy",
            ]);
    }
}
