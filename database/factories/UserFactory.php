<?php

namespace Database\Factories;

use App\Constants\RoleTypeConst;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected static ?string $password;

    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
            'role' => RoleTypeConst::RECEPTIONIST,
        ];
    }

    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    public function receptionist(string $email = null): static
    {
        return $this->state(fn (array $attributes) => [
            'email' => $email ?? fake()->unique()->safeEmail(),
            'role' => RoleTypeConst::RECEPTIONIST,
        ]);
    }

    public function doctor(string $email = null): static
    {
        return $this->state(fn (array $attributes) => [
            'email' => $email ?? fake()->unique()->safeEmail(),
            'role' => RoleTypeConst::DOCTOR,
        ]); 
    }
}
