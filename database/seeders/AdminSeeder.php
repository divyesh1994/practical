<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::Table('users')->delete();

        DB::Table('users')->insert([
			[
                'name' => 'Super Admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('password')
			]
		]);
    }
}
