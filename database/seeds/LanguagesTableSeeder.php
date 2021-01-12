<?php

use Illuminate\Database\Seeder;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [
            [
                'name'      => 'Azerbaijani',
                'code'      => 'az',
                'status'    => 1,
                'direction' => 'ltr',
            ],
            [
                'name'      => 'English',
                'code'      => 'en',
                'status'    => 1,
                'direction' => 'ltr',

            ],
            [
                'name'      => 'Russian',
                'code'      => 'ru',
                'status'    => 1,
                'direction' => 'ltr',

            ]
        ];

        foreach ($array as $language){
            \App\Models\Language::updateOrCreate($language);
        }

    }
}
