<?php

namespace App\Filament\Widgets;

use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;

class SalesChart extends ApexChartWidget
{
    protected static ?string $chartId = 'salesChart';
    protected static ?string $heading = 'Grafik Total Penjualan';

    protected function getOptions(): array
    {
        return [
            'chart' => [
                'type' => 'bar', // Bar chart
                'height' => 300,
            ],
            'series' => [
                [
                    'name' => 'Penjualan',
                    'data' => [100, 200, 150, 300, 250, 400],
                ],
            ],
            'xaxis' => [
                'categories' => ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
            ],
        ];
    }
}
