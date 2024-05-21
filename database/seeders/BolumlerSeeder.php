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
                'bolumler_en' => '',

            ],
            [   'id' => 2,
                'bolumler_tr' => 'Fizyoterapi(Tezli - Turkce)',
                'bolumler_en' => '',

            ],
            [   'id' => 3,
                'bolumler_tr' => 'Is Saglıgı Ve Guvenligi(Tezsiz-Türkçe)',
                'bolumler_en' => '',

            ],
            [   'id' => 4,
                'bolumler_tr' => 'Isletme(Doktora)',
                'bolumler_en' => '',
            ],
            [   'id' => 5,
                'bolumler_tr' => 'İnsaat Mühendisligi (Tezli-İngilizce)',
                'bolumler_en' => '',
            ],
            [   'id' => 6,
                'bolumler_tr' => 'İnsaat Mühendisligi (Tezli-Türkçe)',
                'bolumler_en' => '',
            ],
            [   'id' => 7,
                'bolumler_tr' => 'İnsaat Mühendisligi (Tezsiz-Türkçe)',
                'bolumler_en' => '',
            ],
            [   'id' => 8,
                'bolumler_tr' => 'İsletme(Tezli-Inglizce)',
                'bolumler_en' => '',
            ],
            [   'id' => 9,
                'bolumler_tr' => 'İsletme(Tezli-Turkce)',
                'bolumler_en' => '',
            ],
            [   'id' => 10,
                'bolumler_tr' => 'İsletme(Tezsiz-Inglizce)',
                'bolumler_en' => '',
            ],
            [   'id' => 11,
                'bolumler_tr' => 'İsletme(Tezsiz-Turkce)',
                'bolumler_en' => '',
            ],
            [   'id' => 12,
                'bolumler_tr' => 'K.Siyaset ve Uİ(Tezli-Ingilizce)',
                'bolumler_en' => '',
            ],
            [   'id' => 13,
                'bolumler_tr' => 'K.Siyaset ve Uİ(Tezsiz-Turkce)',
                'bolumler_en' => '',
            ],
            [   'id' => 14,
                'bolumler_tr' => 'Kamu Hukuku (Doktora)',
                'bolumler_en' => '',
            ],
            [   'id' => 15,
                'bolumler_tr' => 'Kamu Hukuku(Tezli-Turkce)',
                'bolumler_en' => '',
            ],
            [   'id' => 16,
                'bolumler_tr' => 'Kamu Hukuku(Tezsiz-Turkce)',
                'bolumler_en' => '',
            ],
            [   'id' => 17,
                'bolumler_tr' => 'Klinik Psikoloji(Tezli - Türkçe)',
                'bolumler_en' => '',
            ],
            [   'id' => 18,
                'bolumler_tr' => 'Mimarlık(Tezli - Türkçe)',
                'bolumler_en' => '',
            ],
            [   'id' => 19,
                'bolumler_tr' => 'Ozel Hukuk(Tezli-Turkce)',
                'bolumler_en' => '',
            ],
            [   'id' => 20,
                'bolumler_tr' => 'Ozel Hukuk(Tezsiz-Turkce)',
                'bolumler_en' => '',
            ],
            [   'id' => 21,
                'bolumler_tr' => 'Siber Güvenlik(Tezli - Ingilizce)',
                'bolumler_en' => '',
            ],
            [   'id' => 22,
                'bolumler_tr' => 'Siber Güvenlik(Tezli - Türkçe)',
                'bolumler_en' => '',
            ],
            [   'id' => 23,
                'bolumler_tr' => 'Veri Bilimi(Tezsiz - Ingilizce)',
                'bolumler_en' => '',
            ]
        ];

        foreach ($bolumler as $bolumlers)
        {
            Bolumler::create($bolumlers);
        }
    }
}
