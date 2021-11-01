<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function salesView()
    {
       
        return view('admin.sales.salesView');
    }

    public function autoSearch(Request $request)
    {
        return $request->all();
    }
}
