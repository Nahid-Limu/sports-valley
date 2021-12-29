<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\CategoryDetails;
use App\BusinessCategory;
use App\Product;
use App\Brand;
use App\ProductImage;
use App\Invoice;
use App\Profite;
use Auth;
use DB;
use Intervention\Image\Facades\Image as Image;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    
    public function viewDashboard()
    {
        $ThisYear = date("Y");
        $ThisMonth = date("m");
        $ThisDay = date("Y-m-d");
       

        $TotalBusinessCategory = BusinessCategory::count();
        $TotalCategoryDetails = CategoryDetails::count();
        $TotalBrand = Brand::count();
        $TotalProduct = Product::count();

        $TotalIncome = Profite::all()->sum('selling_price');
        $TotalProfite = Profite::all()->sum('profite');
        $TotalDiscount = Profite::all()->sum('discount_amount');
        $TotalExpense = 0;
        
        
        $lineChartIncome = Profite::select(DB::raw('YEAR(created_at) year, MONTH(created_at) month'),DB::raw('SUM(selling_price) as monthlyTestPrice'))
        ->groupby('year','month')
        ->get();


        $DailyIncome = Profite::whereDate('created_at', $ThisDay)->sum('selling_price');
        $MonthlyIncome = Profite::whereMonth('created_at', $ThisMonth)->sum('selling_price');
        $YearlyIncome = Profite::whereYear('created_at', $ThisYear)->sum('selling_price');

        // $DailyExpense = DailyExpense::whereDate('created_at', $ThisDay)->sum('ammount');
        // $MonthlyExpense = DailyExpense::whereMonth('created_at', $ThisMonth)->sum('ammount');
        // $YearlyExpense = DailyExpense::whereYear('created_at', $ThisYear)->sum('ammount');
        
        $ToDaysInvoice = Invoice::whereDate('created_at', $ThisDay)->get()->Count();
        $ThisMonthsInvoice = Invoice::whereMonth('created_at', $ThisMonth)->get()->Count();
        $ThisYearsInvoice = Invoice::whereYear('created_at', $ThisYear)->get()->Count();
        $ToatalInvoice = Invoice::all()->Count();
        // dd($ToDaysInvoice);
        // return view('admin.dashboard');
        return view('admin.dashboard', compact('TotalBusinessCategory','TotalCategoryDetails','TotalBrand','TotalProduct'
        ,'TotalIncome','TotalProfite','TotalDiscount','TotalExpense'
        ,'DailyIncome','MonthlyIncome','YearlyIncome'
        ,'ToDaysInvoice','ThisMonthsInvoice','ThisYearsInvoice','ToatalInvoice'));
    }
}
