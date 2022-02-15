<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Comasy\Admin\Models\Admin::create([
            'name' => 'Shabeeb',
            'email' => 'shabeeboali@gmail.com',
            'password' => Hash::make('123456')
        ]);
    }
}
