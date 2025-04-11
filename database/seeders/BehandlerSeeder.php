<?php

namespace Database\Seeders;

use App\Models\Behandler;
use Illuminate\Database\Seeder;


class BehandlerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Behandler::factory()->create();
    }
}
