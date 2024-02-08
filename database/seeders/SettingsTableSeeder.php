<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        DB::table('settings')->truncate();
        DB::table('settings')->insert(
            [
                [
                    'key'   => 'app_name',
                    'value' => 'Test App',
                    'created_at' => now()
                ],
                [
                    'key'   => 'date_format',
                    'value' => 'MM/DD/YYYY',
                    'created_at' => now()
                ],
                [
                    'key'   => 'pagination_limit',
                    'value' => 10,
                    'created_at' => now()
                ],
            ]
        );
    }
}
