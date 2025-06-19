<?php

namespace App\Filament\Widgets;

use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;
use Illuminate\Support\Facades\DB;

class TopProductsChart extends ApexChartWidget
{
    protected static ?string $chartId = 'topProductsChart';
    protected static ?string $heading = 'Produk Paling Banyak Terjual';
    protected function getOptions(): array
    {
        $records = DB::table('fact_sales')
            ->join('dim_product', 'fact_sales.product_id', '=', 'dim_product.product_id')
            ->select('dim_product.product', DB::raw('SUM(fact_sales.units_sold) as total_qty'))
            ->groupBy('dim_product.product')
            ->orderByDesc('total_qty')
            ->limit(5)
            ->get();

        return [
            'chart' => [
                'type' => 'bar',
                'height' => 300,
            ],
            'series' => [
                [
                    'data' => $records->pluck('total_qty')->toArray(),
                ],
            ],
            'xaxis' => [
                'categories' => $records->pluck('product')->toArray(),
            ],
        ];
    }
}
