<?php

namespace Database\Factories;

use App\Enums\ContactStatusEnum;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => Str::uuid(),
            'created_by' => User::factory()->create(),
            'status' => \Arr::random(ContactStatusEnum::getValuesForMigration()),
            'full_name' => fake()->name,
        ];
    }
}
