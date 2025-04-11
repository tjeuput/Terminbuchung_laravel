<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Behandler>
 */
class BehandlerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => 'Prof. Dr. Shaun Kross',
            'fachbereich' =>'Allgemeinmedizin',
            'ist_verfuegbar' => true
        ];
    }
}
