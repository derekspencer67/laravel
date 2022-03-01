<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ThemesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('themes')->insert([
            'name' => 'Cerulean',
            'cdn_url' => 'https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/cerulean/bootstrap.min.css',
            'created_by' => 3,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('themes')->insert([
            'name' => 'Cyborg',
            'cdn_url' => 'https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/cyborg/bootstrap.min.css',
            'created_by' => 3,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('themes')->insert([
            'name' => 'Journal',
            'cdn_url' => 'https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/journal/bootstrap.min.css',
            'created_by' => 3,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('themes')->insert([
            'name' => 'Lux',
            'cdn_url' => 'https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/lux/bootstrap.min.css',
            'created_by' => 3,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('themes')->insert([
            'name' => 'Minty',
            'cdn_url' => 'https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/minty/bootstrap.min.css',
            'created_by' => 3,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('themes')->insert([
            'name' => 'Slate',
            'cdn_url' => 'https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/slate/bootstrap.min.css',
            'created_by' => 3,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
