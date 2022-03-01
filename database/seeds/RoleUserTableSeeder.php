<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jane = DB::table('users')->where('name', '=', 'Jane UserAdmin')->first();
        $bob = DB::table('users')->where('name', '=', 'Bob Moderator')->first();
        $susan = DB::table('users')->where('name', '=', 'Susan ThemeAdmin')->first();

        $userAdmin = DB::table('roles')->where('name', '=', 'User Administrator')->first();
        $moderator = DB::table('roles')->where('name', '=', 'Moderator')->first();
        $themeAdmin = DB::table('roles')->where('name', '=', 'Theme Manager')->first();

        DB::table('role_user')->insert([
            'user_id' => $jane->id,
            'role_id' => $userAdmin->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('role_user')->insert([
            'user_id' => $bob->id,
            'role_id' => $moderator->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('role_user')->insert([
            'user_id' => $susan->id,
            'role_id' => $themeAdmin->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
