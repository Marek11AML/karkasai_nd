<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Conference;

class ConferenceSeeder extends Seeder
{
    public function run()
    {
        Conference::create([
            'title' => 'Pirma konferencija',
            'date' => '2023-01-01',
            'time' => '10:00',
        ]);

        Conference::create([
            'title' => 'Antra konferencija',
            'date' => '2023-02-01',
            'time' => '14:30',
        ]);

    }
}
