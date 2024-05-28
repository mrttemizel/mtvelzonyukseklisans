<?php

namespace App\Charts;

use App\Models\Student;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class MonthlyUsersChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\HorizontalBar
    {
        $from = date('2024-05-01');
        $to = date('2024-10-01');

        return $this->chart->horizontalBarChart()
            ->setTitle('2024 - 2025 Güz Dönemi , Bölümlere Göre Başvuran Kişi Sayısı')
            ->setSubtitle('Toplam Sayi:'.Student::whereBetween('created_at',[$from, $to])->count())
            ->setColors(['#00acc8', '#00acc8'])
            ->addData('Toplam Basvuru', [
                Student::whereBetween('created_at',[$from, $to])->where('bolum_id', '=', 1)->count(),
                Student::whereBetween('created_at',[$from, $to])->where('bolum_id', '=', 2)->count(),
                Student::whereBetween('created_at',[$from, $to])->where('bolum_id', '=', 3)->count(),
                Student::whereBetween('created_at',[$from, $to])->where('bolum_id', '=', 4)->count(),
                Student::whereBetween('created_at',[$from, $to])->where('bolum_id', '=', 5)->count(),
                Student::whereBetween('created_at',[$from, $to])->where('bolum_id', '=', 6)->count(),
                Student::whereBetween('created_at',[$from, $to])->where('bolum_id', '=', 7)->count(),
                Student::whereBetween('created_at',[$from, $to])->where('bolum_id', '=', 8)->count(),
                Student::whereBetween('created_at',[$from, $to])->where('bolum_id', '=', 9)->count(),
                Student::whereBetween('created_at',[$from, $to])->where('bolum_id', '=', 10)->count(),
                Student::whereBetween('created_at',[$from, $to])->where('bolum_id', '=', 11)->count(),
                Student::whereBetween('created_at',[$from, $to])->where('bolum_id', '=', 12)->count(),
                Student::whereBetween('created_at',[$from, $to])->where('bolum_id', '=', 13)->count(),
                Student::whereBetween('created_at',[$from, $to])->where('bolum_id', '=', 14)->count(),
                Student::whereBetween('created_at',[$from, $to])->where('bolum_id', '=', 15)->count(),
                Student::whereBetween('created_at',[$from, $to])->where('bolum_id', '=', 16)->count(),
                Student::whereBetween('created_at',[$from, $to])->where('bolum_id', '=', 17)->count(),
                Student::whereBetween('created_at',[$from, $to])->where('bolum_id', '=', 18)->count(),
                Student::whereBetween('created_at',[$from, $to])->where('bolum_id', '=', 19)->count(),
                Student::whereBetween('created_at',[$from, $to])->where('bolum_id', '=', 20)->count(),
                Student::whereBetween('created_at',[$from, $to])->where('bolum_id', '=', 21)->count(),
                Student::whereBetween('created_at',[$from, $to])->where('bolum_id', '=', 22)->count(),
                Student::whereBetween('created_at',[$from, $to])->where('bolum_id', '=', 23)->count(),

            ])

            ->setXAxis([
                'Elektirik ve Bilgisayar Guvenligi(Tezli-Turkce)',
                'Fizyoterapi(Tezli - Turkce)',
                'Is Saglıgı Ve Guvenligi(Tezsiz-Türkçe)',
                'İşletme (Doktora)',
                'İnsaat Mühendisligi (Tezli-İngilizce)',
                'İnsaat Mühendisligi (Tezli-Türkçe)',
                'İnsaat Mühendisligi (Tezsiz-Türkçe)',
                'İsletme(Tezli-Inglizce)',
                'İsletme(Tezli-Turkce)',
                'İsletme(Tezsiz-Inglizce)',
                'İsletme(Tezsiz-Turkce)',
                'K.Siyaset ve Uİ(Tezli-Ingilizce)',
                'K.Siyaset ve Uİ(Tezsiz-Turkce)',
                'Kamu Hukuku (Doktora)',
                'Kamu Hukuku(Tezli-Turkce)',
                'Kamu Hukuku(Tezsiz-Turkce)',
                'Klinik Psikoloji(Tezli - Türkçe)',
                'Mimarlık(Tezli - Türkçe)',
                'Ozel Hukuk(Tezli-Turkce)',
                'Ozel Hukuk(Tezsiz-Turkce)',
                'Siber Güvenlik(Tezli - Ingilizce)',
                'Siber Güvenlik(Tezli - Türkçe)',
                'Veri Bilimi(Tezsiz - Ingilizce)',
            ]);

    }
}
