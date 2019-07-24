<?php

use Illuminate\Database\Seeder;
use App\Facility;

class FacilitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('facilities')->delete(); //最初に全件削除

        Facility::create([
            'name' => '会議室',
        //   'password' => bcrypt('yamada123') //暗号化します
        ]);

        Facility::create([
            'name' => '家庭科室',
            // 'password' => bcrypt('sato456') //暗号化
        ]);

        Facility::create([
            'name' => '理科室',
            // 'password' => bcrypt('sato456') //暗号化
        ]);

        Facility::create([
            'name' => '視聴覚室',
            // 'password' => bcrypt('sato456') //暗号化
        ]);

        Facility::create([
            'name' => '体育館',
            // 'password' => bcrypt('sato456') //暗号化
        ]);

        Facility::create([
            'name' => '放送室',
            // 'password' => bcrypt('sato456') //暗号化
        ]);
    }
}
