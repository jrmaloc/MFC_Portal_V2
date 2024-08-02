<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Servant Council, National Coordinator, Section Coordinator, Provincial Coordinator, Area Servant, Chapter Servant, Unit Servant, Household Servant, Mission Volunteer, Full Time

        Service::create([
            'name' => 'Servant Council',
        ]);

        Service::create([
            'name' => 'National Coordinator',
        ]);

        Service::create([
            'name' => 'Section Coordinator',
        ]);

        Service::create([
            'name' => 'Provincial Coordinator',
        ]);

        Service::create([
            'name' => 'Area Servant',
        ]);

        Service::create([
            'name' => 'Chapter Servant',
        ]);

        Service::create([
            'name' => 'Unit Servant',
        ]);

        Service::create([
            'name' => 'Household Servant',
        ]);

        Service::create([
            'name' => 'Mission Volunteer',
        ]);

        Service::create([
            'name' => 'Full Time',
        ]);

    }
}
