<?php

use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->insert([
            [
                'type_name' => 'mouse'
            ],
            [
                'type_name' => 'keyborad'
            ],
            [
                'type_name' => 'monitor'
            ],
            [
                'type_name' => 'headphone'
            ],
            [
                'type_name' => 'earphone'
            ],
            // [
            //     'type_name' => 'pc'
            // ],
            // [
            //     'type_name' => 'chair'
            // ],
        ]);
    }
}
