<?php

use Illuminate\Database\Seeder;

class AreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('areas')->insert([
            [
                'name' => '神戸市',
                'prefecture_id' => 1,
            ],
            
            [
                'name' => '西宮市',
                'prefecture_id' => 1,
            ],
            
            [
                'name' => '宝塚市',
                'prefecture_id' => 1,
            ],
            
            [
                'name' => '三田市',
                'prefecture_id' => 1,
            ],
            
            [
                'name' => '明石市',
                'prefecture_id' => 1,
            ],
            
            [
                'name' => '寝屋川市',
                'prefecture_id' => 2,
            ],
            
            [
                'name' => '四條畷市',
                'prefecture_id' => 2,
            ],
            
            [
                'name' => '大東市',
                'prefecture_id' => 2,
            ],
            
            [
                'name' => '門真市',
                'prefecture_id' => 2,
            ],
            
            [
                'name' => '枚方市',
                'prefecture_id' => 2,
            ],
            
        ]);
    }
}
