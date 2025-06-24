<?php

namespace App\Filament\Widgets;

use App\Models\FactSale;
use App\Models\FactSales;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class BlogPostsChart extends ChartWidget
{
    protected static ?string $heading = 'Total Penjualan per Bulan';

    protected function getData(): array
    {
        $data = FactSale::join('dim_time', 'fact_sales.time_id', '=', 'dim_time.time_id')
            ->selectRaw('dim_time.month_name, SUM(fact_sales.sales) as total_sales')
            ->groupBy('dim_time.month_number', 'dim_time.month_name') // biar urut
            ->orderBy('dim_time.month_number')
            ->get();

        return [
            'labels' => $data->pluck('month_name')->toArray(),
            'datasets' => [
                [
                    'label' => 'Total Penjualan',
                    'data' => $data->pluck('total_sales')->toArray(),
                    'backgroundColor' => '#4ade80', // hijau stabilo
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
