<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [[
            'name'=>'News Portal',
            'value'=>'News Portal',
        ],[
            'name'=>'Favicon',
            'value'=>'favicon.png',
        ],[
            'name'=>'front_logo',
            'value'=>'front_logo.png',
        ],[
            'name'=>'admin_logo',
            'value'=>'admin_logo.png',
        ]];
       DB::table('settings')->insert($data);
    }
}
