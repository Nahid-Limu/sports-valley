<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function home()
    {
        return view('homePage');
    }


    public function productDetails()
    {
        return view('productDetails');
    }
}
