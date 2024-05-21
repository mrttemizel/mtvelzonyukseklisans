<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admins = [
            [   'id' => 1,
                'duyuru_tr' => 'Başvuru Tarihleri 15.12.2023 açılacaktır.',
                'duyuru_en' => 'Application Dates will open on 15.12.2023.',
                'status' => 'on',
            ]
        ];

        foreach ($admins as $admin) {
            Setting::create($admin);
        }
    }
}
