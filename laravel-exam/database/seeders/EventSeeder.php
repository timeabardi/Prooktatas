<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       DB::table('events')->insert([[
            'name' => 'Streetball',
            'type' => 'kültéri',
            'desc' => 'Decathlon B33 Diákolimpia',
            'event_start_at' => '2023-11-20 08:00:00',
            'published_at' => '2023-11-15 10:00:00'
        ],[
            'name' => 'Labdarúgás',
            'type' => 'kültéri',
            'desc' => 'Eb-selejtező',
            'event_start_at' => '2023-11-24 08:00:00',
            'published_at' => '2023-11-18 10:00:00'
        ],[
            'name' => 'Futóverseny',
            'type' => 'kültéri',
            'desc' => 'Ultra Tisza-tó',
            'event_start_at' => '2023-08-15 08:00:00',
            'published_at' => '2023-07-16 10:00:00'
        ],[
            'name' => 'Jégkorong',
            'type' => 'beltéri',
            'desc' => 'Vb-selejtező',
            'event_start_at' => '2023-12-22 08:00:00',
            'published_at' => '2023-12-08 10:00:00'
        ]]);
    }
}