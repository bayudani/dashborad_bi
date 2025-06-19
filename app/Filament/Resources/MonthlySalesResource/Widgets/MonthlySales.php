<?php

namespace App\Filament\Widgets;

use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;
use Illuminate\Support\Facades\DB;

class MonthlySales extends ApexChartWidget
{
    protected static ?string $chartId = 'monthlySales';
    protected static ?string $heading = 'Tren Penjualan Bulanan';

     protected function getOptions(): array
    {
        $records = DB::table('fact_sales')
            ->join('dim_time', 'fact_sales.time_id', '=', 'dim_time.time_id')
            ->select('dim_time.month_name', DB::raw('SUM(fact_sales.sales) as total'))
            ->groupBy('dim_time.month_number', 'dim_time.month_name')
            ->orderBy('dim_time.month_number')
            ->get();

        return [
            'chart' => [
                'type' => 'line',
                'height' => 300,
            ],
            'series' => [
                [
                    'data' => $records->pluck('total')->toArray(),
                ],
            ],
            'xaxis' => [
                'categories' => $records->pluck('month_name')->toArray(),
            ],
        ];
    }
}
