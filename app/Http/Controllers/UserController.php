<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\CategoryDetails;
use App\BusinessCategory;
use Auth;
use DB;

class UserController extends Controller
{
    public function home()
    {
        return view('homePage');
    }


    public function categoryDetails($cat)
    {
        $cat = (base64_decode($cat));

        $cat_details = DB::table('category_details')
            ->join('business_categories', 'category_details.bc_id', '=', 'business_categories.id')
            
            ->select('category_details.id','category_details.cat_product','category_details.image')
            
            ->where('business_categories.cat_name', $cat)
            // ->get();
            ->paginate(6);
            
        // dd($cat_details);
        return view('catDetails', compact('cat_details'));
    }

    public function productDetails($id)
    {
        $id = (base64_decode($id));
        dd($id);
        return view('productDetails');
    }
}
