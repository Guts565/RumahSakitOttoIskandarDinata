<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Helpers\IndonesiaWeekdays;
use App\Models\Dokter;
use App\Models\Jadwal;
use Faker\Factory as Faker;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Jadwal>
 */
class JadwalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // $Dokter = Dokter::where('id', '1')->first(); // Replace 'Dokter Name' with the actual name
        // $Dokter = Dokter::where('id', '2')->first(); // Replace 'Dokter Name' with the actual name
        // $Dokter = Dokter::where('id', '3')->first(); // Replace 'Dokter Name' with the actual name
        // $Dokter = Dokter::where('id', '4')->first(); // Replace 'Dokter Name' with the actual name
        $DokterIds = Dokter::pluck('id')->toArray();
        foreach ($DokterIds as $Dokterid) {
            $dokter = new Jadwal();
            $dokter->idDokter = $Dokterid;
            $dokter->hari = fake()->dayOfWeek();
            $dokter->waktu = fake()->time();
            $dokter->save();
        }
        return [
            'idDokter' => $Dokterid,
            'hari' => fake()->dayOfWeek(),
            'waktu' => fake()->time(),
        ];
    }
}
