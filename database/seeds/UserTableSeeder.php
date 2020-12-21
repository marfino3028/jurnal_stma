<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
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
            ['id' => 1, 'name' => 'Administrator','username'=>'administrator','password'=>Hash::make('admin123'),'email'=>'admin@dwijonarko.my.id','role_id'=>1,'email_verified_at'=>'2020-09-08 15:08:40'],
            ['id' => 2, 'name' => 'Dosen' ,'username'=>'dosen','password'=>Hash::make('dosen'),'email'=>'dosen@dwijonarko.my.id','role_id'=>2,'email_verified_at'=>'2020-09-08 15:08:40'],
            ['id' => 3, 'name' => 'Mahasiswa','username'=>'mahasiswa','password'=>Hash::make('mahasiswa'),'email'=>'mahasiswa@dwijonarko.my.id','role_id'=>3,'email_verified_at'=>'2020-09-08 15:08:40'],
            ['id' => 4, 'name' => 'User','username'=>'registered','password'=>Hash::make('registered'),'email'=>'user@dwijonarko.my.id','role_id'=>4,'email_verified_at'=>'2020-09-08 15:08:40'],
        ]);
    }
}
