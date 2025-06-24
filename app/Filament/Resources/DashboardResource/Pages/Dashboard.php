<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;
use App\Filament\Widgets\StatsOverview;
use App\Filament\Widgets\SalesChart;
use App\Filament\Widgets\MonthlySales;
use App\Filament\Widgets\TopProductsChart;
use App\Filament\Widgets\SalesByCountryChart;
class Dashboard extends BaseDashboard
{
    protected function getHeaderWidgets(): array
    {
        return [
            StatsOverview::class,
            SalesChart::class,
            MonthlySales::class,
            TopProductsChart::class,
            SalesByCountryChart::class,
        ];
    }
}
