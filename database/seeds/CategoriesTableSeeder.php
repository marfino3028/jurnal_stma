<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->delete();
        DB::table('categories')->insert([
            ['id' => 1, 'name' => 'DIPLOMA PROGRAMME PRACTICE REPORT','description'=>'Koleksi Laporan Praktek Kerja Program Diploma'],
            ['id' => 2, 'name' => 'UNDERGRADUATE THESES','description'=>'Koleksi Skripsi Program Sarjana'],
            ['id' => 3, 'name' => 'THESES','description'=>'Koleksi Tesis Program Magister'],
            ['id' => 4, 'name' => 'DISSERTATION','description'=>'Koleksi Disertasi Program Doktoraa'],
            ['id' => 5, 'name' => 'e-Journa','description'=>'Koleksi Penelitian yang tidak dipublikasikan pada jurnal ilmiah'],
            ['id' => 6, 'name' => 'e-Books','description'=>'e-book terbitan STMA Trisakti'],
            ['id' => 7, 'name' => 'COMMUNITY SERVICES REPORT(LPM)','description'=>'Laporan Hasil Pengabdian Pada Masyarakat'],
            ['id' => 8, 'name' => 'STUDENT CREATIVITY PROGRAMME REPORT','description'=>'gram Kreatifitas Mahasiswa'],
            ['id' => 9, 'name' => 'INSURANCE NEWS','description'=>'Berita seputar asuransi'],
        ]);
    }
}
