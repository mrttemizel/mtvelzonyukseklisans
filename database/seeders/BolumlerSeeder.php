<?php

namespace Database\Seeders;

use App\Models\Bolumler;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BolumlerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bolumler = [
            [   'id' => 1,
                'bolumler_tr' => 'Elektirik ve Bilgisayar Guvenligi(Tezli-Turkce)',
                'bolumler_en' => 'Electrical and Computer Security (Thesis-Turkish)',

            ],
            [   'id' => 2,
                'bolumler_tr' => 'Fizyoterapi(Tezli - Turkce)',
                'bolumler_en' => 'Physiotherapy(With Thesis - Turkish)',

            ],
            [   'id' => 3,
                'bolumler_tr' => 'Is Saglıgı Ve Guvenligi(Tezsiz-Türkçe)',
                'bolumler_en' => 'Occupational Health and Safety (Non-Thesis-Turkish)',

            ],
            [   'id' => 4,
                'bolumler_tr' => 'İşletme (Doktora)',
                'bolumler_en' => 'Business Administration (Ph.D.)',
            ],
            [   'id' => 5,
                'bolumler_tr' => 'İnsaat Mühendisligi (Tezli-İngilizce)',
                'bolumler_en' => 'Civil Engineering (Thesis-English)',
            ],
            [   'id' => 6,
                'bolumler_tr' => 'İnsaat Mühendisligi (Tezli-Türkçe)',
                'bolumler_en' => 'Civil Engineering (Thesis-Turkish)',
            ],
            [   'id' => 7,
                'bolumler_tr' => 'İnsaat Mühendisligi (Tezsiz-Türkçe)',
                'bolumler_en' => 'Civil Engineering (Non-Thesis-Turkish)',
            ],
            [   'id' => 8,
                'bolumler_tr' => 'İsletme(Tezli-Inglizce)',
                'bolumler_en' => 'Business Administration (Thesis-English)',
            ],
            [   'id' => 9,
                'bolumler_tr' => 'İsletme(Tezli-Turkce)',
                'bolumler_en' => 'Business Administration (Thesis-Turkish)',
            ],
            [   'id' => 10,
                'bolumler_tr' => 'İsletme(Tezsiz-Inglizce)',
                'bolumler_en' => 'Business Administration (Non-Thesis-English)',
            ],
            [   'id' => 11,
                'bolumler_tr' => 'İsletme(Tezsiz-Turkce)',
                'bolumler_en' => 'Business Administration (Without Thesis-Turkish)',
            ],
            [   'id' => 12,
                'bolumler_tr' => 'K.Siyaset ve Uİ(Tezli-Ingilizce)',
                'bolumler_en' => 'K.Politics and IR (Thesis-English)',
            ],
            [   'id' => 13,
                'bolumler_tr' => 'K.Siyaset ve Uİ(Tezsiz-Turkce)',
                'bolumler_en' => 'K.Politics and IR (Non-Thesis-Turkish)',
            ],
            [   'id' => 14,
                'bolumler_tr' => 'Kamu Hukuku (Doktora)',
                'bolumler_en' => 'Public Law (Ph.D.)',
            ],
            [   'id' => 15,
                'bolumler_tr' => 'Kamu Hukuku(Tezli-Turkce)',
                'bolumler_en' => 'Public Law (Thesis-Turkish)',
            ],
            [   'id' => 16,
                'bolumler_tr' => 'Kamu Hukuku(Tezsiz-Turkce)',
                'bolumler_en' => 'Public Law (Non-Thesis-Turkish)',
            ],
            [   'id' => 17,
                'bolumler_tr' => 'Klinik Psikoloji(Tezli - Türkçe)',
                'bolumler_en' => 'Clinical Psychology(With Thesis - Turkish)',
            ],
            [   'id' => 18,
                'bolumler_tr' => 'Mimarlık(Tezli - Türkçe)',
                'bolumler_en' => 'Architecture(Thesis - Turkish)',
            ],
            [   'id' => 19,
                'bolumler_tr' => 'Ozel Hukuk(Tezli-Turkce)',
                'bolumler_en' => 'Private Law (Thesis-Turkish)',
            ],
            [   'id' => 20,
                'bolumler_tr' => 'Ozel Hukuk(Tezsiz-Turkce)',
                'bolumler_en' => 'Private Law (Non-Thesis-Turkish)',
            ],
            [   'id' => 21,
                'bolumler_tr' => 'Siber Güvenlik(Tezli - Ingilizce)',
                'bolumler_en' => 'Cyber Security (Thesis - English)',
            ],
            [   'id' => 22,
                'bolumler_tr' => 'Siber Güvenlik(Tezli - Türkçe)',
                'bolumler_en' => 'Cyber Security(Thesis - Turkish)',
            ],
            [   'id' => 23,
                'bolumler_tr' => 'Veri Bilimi(Tezsiz - Ingilizce)',
                'bolumler_en' => 'Data Science (Non-Thesis - English)',
            ]
        ];

        foreach ($bolumler as $bolumlers)
        {
            Bolumler::create($bolumlers);
        }
    }
}
