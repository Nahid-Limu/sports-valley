<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function home()
    {
        return view('homePage');
    }


    public function categoryDetails()
    {
        // $str = 'VGhpcyBpcyBhbiBlbmNvZGVkIHN0cmluZw==';
        // echo base64_decode($str).'</br>';
        
        // $str = 'This is an encoded string';
        // echo base64_encode($str);
        // dd(base64_decode($cat));

        // dd($cat);
        return view('catDetails');
    }

    public function productDetails()
    {
        return view('productDetails');
    }
}
