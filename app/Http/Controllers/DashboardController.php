<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index_admin()
    {
        // Fetch the emiten count
        $total_emitens = DB::table('emitens')->count();

        $total_volume = DB::table('transaksi_harians')
            ->select(DB::raw('SUM(volume) as total_volume'))
            ->first()->total_volume;

        $total_value = DB::table('transaksi_harians')
            ->select(DB::raw('SUM(value) as total_value'))
            ->first()->total_value;

        $total_frequency = DB::table('transaksi_harians')
            ->select(DB::raw('SUM(frequency) as total_frequency'))
            ->first()->total_frequency;

        // Fetch transaction data and calculate summaries
        $transactions = DB::table('transaksi_harians')
            ->select('stock_code', DB::raw('SUM(volume) as sum_volume, SUM(value) as sum_value, SUM(frequency) as sum_frequency, date_transaction'))
            ->groupBy('stock_code', 'date_transaction')
            ->paginate(10);

        // Fetch data for bar chart (volume per date)
        $bar_data = DB::table('transaksi_harians')
            ->select(DB::raw('DATE(date_transaction) as date'), DB::raw('SUM(volume) as total_volume'))
            ->groupBy(DB::raw('DATE(date_transaction)'))
            ->get();


        $monthly_frequency = DB::table('transaksi_harians')
            ->select(DB::raw('DATE_FORMAT(date_transaction, "%Y-%m") as month'), DB::raw('SUM(frequency) as total_frequency'))
            ->groupBy(DB::raw('DATE_FORMAT(date_transaction, "%Y-%m")'))
            ->get();

        // Extract labels and values from bar_data
        $bar_labels = $bar_data->pluck('date')->toArray(); // Extract dates as labels
        $bar_values = $bar_data->pluck('total_volume')->toArray(); // Extract total volumes as values

        // Prepare pie chart data
        $pie_data = [
            'ANTM' => 10.06,
            'BBCA' => 35.67,
            'BBRI' => 36.09,
            'GOTO' => 15.97,
            'BRIS' => 2.21
        ];

        // Mock data for line chart (replace with actual data from DB)
        $prices = [
            'ANTM' => [5000, 5100, 5200, 5300],
            'BBCA' => [8000, 8200, 8100, 8300],
            'BBRI' => [4000, 4100, 4200, 4300],
            'GOTO' => [1000, 1200, 1100, 1300],
            'BRIS' => [3000, 3100, 3200, 3300],
        ];
        $dates = ['01-01', '01-02', '01-03', '01-04']; // Mock dates

        return view('dashboard.admin', compact(
            'total_emitens',
            'total_volume',
            'total_value',
            'total_frequency',
            'transactions',
            'pie_data',
            'prices',
            'dates',
            'bar_labels',  // Pass the bar labels
            'bar_values'   // Pass the bar values
        ));
    }

    public function index_staff()
    {
        return view('dashboard.staff');
    }
    public function index_pengguna()
    {
        return view('dashboard.pengguna');
    }
}
