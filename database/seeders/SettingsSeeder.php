<?php

namespace Database\Seeders;

use Comasy\Core\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::firstOrCreate([
            'label' => 'Home Page',
            'slug' => 'homepage_id',
            'section' => 'general'
        ], [
            'value' => NULL,
        ]);

        Setting::firstOrCreate([
            'label' => 'Logo',
            'slug' => 'logo',
            'section' => 'general'
        ], [
            'value' => NULL,
        ]);
    }
}
