<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('users')->delete();

        DB::table('users')->insert([
        	'id' => '1',
            'name' => 'Superadmin',
            'email' => 'superadmin@samudra.com',
            'password' => bcrypt('samudra@2019'),
        ]);

        DB::table('users')->insert([
        	'id' => '2',
            'name' => 'Admin',
            'email' => 'admin@samudra.com',
            'password' => bcrypt('samudra@2019'),
        ]);
    }
}
