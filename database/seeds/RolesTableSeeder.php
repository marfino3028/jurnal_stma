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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('roles')->delete();
        DB::table('roles')->insert([
            ['id' => 1, 'name' => 'Administrator','description'=>'Role Administrator'],
            ['id' => 2, 'name' => 'Dosen', 'description'=>'Role Dosen'],
            ['id' => 3, 'name' => 'Mahasiswa', 'description'=>'Role Mahasiswa'],
            ['id' => 4, 'name' => 'User', 'description'=>'Role User'],
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

    }
}
