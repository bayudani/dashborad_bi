<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnalyticsController extends Controller
{
    public function monthlySalesTrend()
    {
        $data = DB::table('fact_sales')
            ->join('dim_time', 'fact_sales.time_id', '=', 'dim_time.time_id')
            ->select('dim_time.month_name', 'dim_time.year', DB::raw('SUM(fact_sales.sales) as total_sales'))
            ->groupBy('dim_time.year', 'dim_time.month_number', 'dim_time.month_name')
            ->orderBy('dim_time.year')
            ->orderBy('dim_time.month_number')
            ->get();

        return response()->json($data);
    }

    public function profitSummary()
    {
        $data = DB::table('fact_sales')
            ->join('dim_time', 'fact_sales.time_id', '=', 'dim_time.time_id')
            ->select('dim_time.month_name', 'dim_time.year', DB::raw('SUM(fact_sales.profit) as total_profit'))
            ->groupBy('dim_time.year', 'dim_time.month_number', 'dim_time.month_name')
            ->orderBy('dim_time.year')
            ->orderBy('dim_time.month_number')
            ->get();

        return response()->json($data);
    }

    public function topSellingProducts()
    {
        $data = DB::table('fact_sales')
            ->join('dim_product', 'fact_sales.product_id', '=', 'dim_product.product_id')
            ->select('dim_product.product', DB::raw('SUM(fact_sales.units_sold) as total_units'))
            ->groupBy('dim_product.product')
            ->orderByDesc('total_units')
            ->limit(5)
            ->get();

        return response()->json($data);
    }

    public function salesByCountry()
    {
        $data = DB::table('fact_sales')
            ->join('dim_country', 'fact_sales.country_id', '=', 'dim_country.country_id')
            ->select('dim_country.country', DB::raw('SUM(fact_sales.sales) as total_sales'))
            ->groupBy('dim_country.country')
            ->orderByDesc('total_sales')
            ->get();

        return response()->json($data);
    }

    public function profitBySegment()
{
    $data = DB::table('fact_sales')
        ->join('dim_segment', 'fact_sales.segment_id', '=', 'dim_segment.segment_id')
        ->select('dim_segment.segment', DB::raw('SUM(fact_sales.profit) as total_profit'))
        ->groupBy('dim_segment.segment')
        ->orderByDesc('total_profit')
        ->get();

    return response()->json($data);
}

}
