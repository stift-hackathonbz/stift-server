<?php

use App\Checklist;
use App\Place;
use App\Tool;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Artisan',
            'email' => 'stift@lvh.it',
            'password' => bcrypt('lvhlvhlvh'),
        ]);

        Place::create([
            'name' => 'Unknown',
            'type' => 'unknown',
        ]);

        $workshop = Place::create([
            'name' => 'Workshop',
            'type' => 'home',
        ]);

        $car = Place::create([
            'name' => 'VW Caddy (Typ 2K)',
            'type' => 'car',
        ]);

        $checklist = Checklist::create([
            'name' => 'VW Caddy (Typ 2K)',
        ]);

        $drill = Tool::create([
            'name' => 'Saw with blue grip',
            'rfid' => 'c07dfea7',
            'last_place_id' => $car->id,
            'last_place_updated_at' => Carbon::now()->subMinutes(rand(0, 10000)),
            'current_place_id' => $workshop->id,
            'current_place_updated_at' => Carbon::now()->subMinutes(rand(0, 10000)),
        ]);

        $saw = Tool::create([
            'name' => 'Wrench',
            'rfid' => '86e58363',
            'last_place_id' => $car->id,
            'last_place_updated_at' => Carbon::now()->subMinutes(rand(0, 10000)),
            'current_place_id' => $workshop->id,
            'current_place_updated_at' => Carbon::now()->subMinutes(rand(0, 10000)),
        ]);

        $toolNames = [
            'hammer',
            'mallet',
            'ax',
            'saw/handsaw',
            'hacksaw',
            'level',
            'screwdriver',
            'Phillips screwdriver ',
            'wrench',
            'monkey wrench/ pipe wrench',
            'chisel',
            'scraper',
            'wire stripper',
            'hand drill',
            'vise',
            'pliers',
            'toolbox',
            'plane',
            'electric drill',
            '(drill) bit',
            'circular saw/ power saw',
            'power sander',
            'router',
            'wire',
            'nail',
            'washer',
            'nut',
            'wood screw',
            'machine screw',
            'bolt'
        ];

        foreach ($toolNames as $toolName) {
            $placeId = \Illuminate\Support\Arr::random([$workshop->id, $car->id]);
            $tool = Tool::create([
                'name' => \Illuminate\Support\Str::ucfirst($toolName),
                'rfid' => \Illuminate\Support\Str::random(),
                'last_place_id' => $placeId,
                'last_place_updated_at' => Carbon::now()->subMinutes(rand(0, 10000)),
                'current_place_id' => $placeId,
                'current_place_updated_at' => Carbon::now()->subMinutes(rand(0, 10000)),
            ]);

            if ($placeId === $car->id) {
                $checklist->tools()->attach($tool);
            }
        }

        $checklist->tools()->attach($drill);
        $checklist->tools()->attach($saw);
    }
}
