<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Helpers\IndonesiaWeekdays;
use App\Models\Dokter;
use App\Models\Poli;
use Faker\Factory as Faker;





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
        // $poli = Poli::all(); // Replace 'Poli Name' with the actual name
        // $poli = Poli::where('id', '2')->first(); // Replace 'Poli Name' with the actual name
        // $poli = Poli::where('id', '3')->first(); // Replace 'Poli Name' with the actual name
        // $poli = Poli::where('id', '4')->first(); // Replace 'Poli Name' with the actual name
        $poliIds = Poli::pluck('id')->toArray();
        foreach ($poliIds as $poliId) {
            $dokter = new Dokter();
            $dokter->idPoli = $poliId;
            $dokter->nama = fake()->name();
            $dokter->alamat = fake()->address();
            $dokter->telp = fake()->phoneNumber();
            $dokter->save();
        }
        return [
            'idPoli' => $poliId,
            'nama' => function () {
                $name = fake()->name('male' | 'female'); // Generate name with optional gender
                $titles = ['Ms.', 'Mr.', 'Miss', 'Mrs.']; // Unwanted titles

                // Filter out names with unwanted titles
                while (preg_match('/^(' . implode('|', $titles) . ')\s+/', $name)) {
                    $name = fake()->name(); // Re-generate name if unwanted title found
                }

                // Remove duplicate "Dr." (if present)
                if (strpos($name, 'Dr.') === 0) {
                    $name = substr($name, 4);
                }

                return 'Dr. ' . $name;
            },
            'alamat' => fake()->address(),
            'telp' => fake()->phoneNumber(),
        ];
    }
}
