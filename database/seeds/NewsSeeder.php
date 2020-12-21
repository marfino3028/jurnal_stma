<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert([
                ['id_news' => 1, 'judul' => 'Keadilan','deskripsi'=>'Keadilan adalah kondisi kebenaran ideal secara moral mengenai sesuatu hal, baik menyangkut benda atau orang. Menurut sebagian besar teori, keadilan memiliki tingkat kepentingan yang besar.', 'img' => 'keadilan.jpg','created_at' => Carbon::now()->format('Y-m-d H:i:s')],
                ['id_news' => 2, 'judul' => 'Keinginan', 'deskripsi'=>'Keinginan adalah harapan atau keinginan untuk sesuatu. Secara fiksi, keinginan dapat digunakan sebagai perangkat plot. Dalam cerita rakyat, peluang untuk "membuat keinginan" atau untuk keinginan "menjadi kenyataan" atau "dikabulkan" adalah tema yang terkadang digunakan.', 'img' => 'keinginan.jpg', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
                
        ]);
    
    }
}
