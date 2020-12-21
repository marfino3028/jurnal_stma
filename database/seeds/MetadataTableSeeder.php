<?php

use Illuminate\Database\Seeder;

class MetadataTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('metadata')->delete();
        DB::table('metadata')->insert([
            ['key' => 'title', 'value'=>'Title','type'=>'text'],
            ['key' => 'abstrak', 'value'=>'Abstrak','type'=>'textarea'],
            ['key' => 'url', 'value'=>'URL','type'=>'text'],
            ['key' => 'date', 'value'=>'Date','type'=>'text'],
            ['key' => 'author', 'value'=>'Author','type'=>'text'],
            ['key' => 'download', 'value'=>'Download','type'=>'text'],
            ['key' => 'view', 'value'=>'View','type'=>'text'],
        ]);
    }
}
