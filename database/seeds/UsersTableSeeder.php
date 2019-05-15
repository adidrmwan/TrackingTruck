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

        DB::table('users')->insert([
            'id' => '3',
            'name' => 'Finance Manager',
            'email' => 'finance@samudra.com',
            'password' => bcrypt('samudra@2019'),
        ]);

        DB::table('users')->insert([
            'id' => '4',
            'name' => 'General Manager',
            'email' => 'general@samudra.com',
            'password' => bcrypt('samudra@2019'),
        ]);

        DB::table('users')->insert([
            'id' => '5',
            'name' => 'Pengurus Trucking',
            'email' => 'trucking@samudra.com',
            'password' => bcrypt('samudra@2019'),
        ]);
    }
}
