<?php

use Illuminate\Database\Seeder;

class PrefecturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('prefectures')->insert([
            ['name' => '兵庫県'],
            ['name' => '大阪府'],
            
        ]);
    }
}
