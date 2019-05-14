<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->delete();

        DB::table('roles')->insert([
        	'id' => '1',
        	'name' => 'superadmin',
        	'description' => 'Superadmin'
        ]);

        DB::table('roles')->insert([
        	'id' => '2',
        	'name' => 'admin',
        	'description' => 'Admin'
        ]);

        DB::table('roles')->insert([
        	'id' => '3',
        	'name' => 'finance_manager',
        	'description' => 'Finance Manager'
        ]);

        DB::table('roles')->insert([
        	'id' => '4',
        	'name' => 'general_manager',
        	'description' => 'General Manager'
        ]);

        DB::table('roles')->insert([
        	'id' => '5',
        	'name' => 'operator_trucking',
        	'description' => 'Operator Trucking'
        ]);
    }
}
