<?php

use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = [
            [
                'key'        => 'phone',
                'value'      => '(000) 000-00-00',
            ],
            [
                'key'        => 'facebook',
                'value'      => '',
            ],
            [
                'key'        => 'instagram',
                'value'      => '',
            ],
            [
                'key'        => 'site_title',
                'value'      => 'napsolution.pro',
            ],
            [
                'key'        => 'site_url',
                'value'      => 'http://napsolution.pro',
            ],
            [
                'key'       => 'email',
                'value'     => 'info@napsolution.pro'
            ],
            [
                'key'   => 'address_az',
                'value' => 'Address.',
            ],
            [
                'key'   => 'address_ru',
                'value' => 'Address.',
            ],
            [
                'key'   => 'address_en',
                'value' => 'Address.',
            ]
        ];


        foreach($settings as $setting) {
            \App\Models\Setting::updateOrCreate([
                'key' => $setting['key']
            ],[
                'value' => $setting['value']
            ]);
        }

    }
}
