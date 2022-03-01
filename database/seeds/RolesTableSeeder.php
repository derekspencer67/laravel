<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'User Administrator',
            'description' => 'Has administrative access to the database.',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('roles')->insert([
            'name' => 'Moderator',
            'description' => 'Moderates the database with limited functionality.',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('roles')->insert([
            'name' => 'Theme Manager',
            'description' => 'Has creative administrative access to the database.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
