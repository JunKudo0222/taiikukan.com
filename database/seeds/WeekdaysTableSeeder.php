<?php

use Illuminate\Database\Seeder;

class WeekdaysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('weekdays')->insert([
            ['name' => '月曜日'],
            ['name' => '火曜日'],
            ['name' => '水曜日'],
            ['name' => '木曜日'],
            ['name' => '金曜日'],
            ['name' => '土曜日'],
            ['name' => '日曜日'],
            
        ]);
    }
}
