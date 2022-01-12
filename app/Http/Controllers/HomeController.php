<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\SaleDetails;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $fromday = Carbon::parse(Carbon::now())->format('Y-m-d') . ' 00:00:00';
        $today = Carbon::parse(Carbon::now())->format('Y-m-d') . ' 23:59:59';
        $frommonth = Carbon::now()->startOfMonth();
        $tomonth = Carbon::now()->endOfMonth();
        $fromyear = Carbon::now()->startOfYear();
        $toyear = Carbon::now()->endOfYear();
        // $from = Carbon::parse($this->dateFrom)->format('Y-m-d') . ' 00:00:00';
        // $to = Carbon::parse($this->dateTo)->format('Y-m-d') . ' 23:59:59';
        $sales_day = Sale::where('status', 'PAID')
            ->whereBetween('created_at', [$fromday, $today])
            ->get();
        $sales_month = Sale::where('status', 'PAID')
            ->whereBetween('created_at', [$frommonth, $tomonth])
            ->get();
        $sales_year = Sale::where('status', 'PAID')
            ->whereBetween('created_at', [$fromyear, $toyear])
            ->get();

        // PRODUCTOS MAS VENDIDOS

        // $products_day = SaleDetails::sum('quantity')->where('products');
        $products_day = SaleDetails::join('products as p', 'p.id', 'sale_details.product_id')
            ->select('sale_details.product_id', 'sale_details.price as price', 'sale_details.quantity as quantity', 'p.name as name')
            ->whereBetween('sale_details.created_at', [$fromday, $today])
            ->get();
        // dd($products_day);
        return view('home', compact('sales_day', 'sales_month', 'sales_year', 'fromday', 'today', 'frommonth', 'tomonth', 'fromyear', 'toyear', 'products_day'));
    }
}
