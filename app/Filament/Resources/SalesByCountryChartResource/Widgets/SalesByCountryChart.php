<?php

namespace App\Filament\Widgets;

use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;
use Illuminate\Support\Facades\DB;

class SalesByCountryChart extends ApexChartWidget
{
    protected static ?string $chartId = 'salesByCountryChart';
    protected static ?string $heading = 'Perbandingan Penjualan per Negara (Pie)';

    protected function getOptions(): array
    {
        $records = DB::table('fact_sales')
            ->join('dim_country', 'fact_sales.country_id', '=', 'dim_country.country_id')
            ->select('dim_country.country', DB::raw('SUM(fact_sales.sales) as total'))
            ->groupBy('dim_country.country')
            ->get();

        // Penanganan jika data kosong
        if ($records->isEmpty()) {
            return [
                'chart' => [
                    'type' => 'pie',
                    'height' => 300,
                ],
                'series' => [0],
                'labels' => ['Data Kosong'],
            ];
        }

        return [
            'chart' => [
                'type' => 'pie',
                'height' => 300,
            ],
            'series' => $records->pluck('total')->toArray(),
            'labels' => $records->pluck('country')->toArray(),
        ];
    }

}
