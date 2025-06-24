<?php

namespace App\Filament\Widgets;

use App\Models\FactSale;
use App\Models\FactSales;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $totalSales = FactSale::sum('sales');

        return [
            Stat::make('Total Penjualan', 'Rp ' . number_format($totalSales, 0, ',', '.'))
                ->description('Total semua penjualan')
                ->color('success'),
        ];
    }
}
