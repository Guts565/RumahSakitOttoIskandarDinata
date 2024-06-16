<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dokter>
 */
class DokterFactory extends Factory
{
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'poliklinik' => fake()->jobTitle(),
            'nama' => fake()->name(),
            'senin' => fake()->time(),
            'selasa' => fake()->time(),
            'rabu' => fake()->time(),
            'kamis' => fake()->time(),
            'jumat' => fake()->time(),
            'sabtu' => fake()->time(),
        ];
    }
}
