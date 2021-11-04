<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\CategoryDetails;
use App\BusinessCategory;
use App\Product;
use App\Brand;
use App\ProductImage;
use Auth;
use DB;
use Intervention\Image\Facades\Image as Image;
use Carbon\Carbon;

class SalesController extends Controller
{
    public function salesView()
    {
       
        return view('admin.sales.salesView');
    }

    public function autoSearch(Request $request)
    {
        // return $request->search;

        // $ids = explode(",", $request->SearchedTestIds);
            $search = $request->search;
            // $tests = Test::where('test_name','LIKE',"%{$search}%")->whereNotIn('id', $ids)->get();

        $products = DB::table('products')
            ->join('category_details', 'products.cd_id', '=', 'category_details.id')
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->join('product_images', 'products.id', '=', 'product_images.p_id')
            ->select('products.id','products.name','products.quantity',
                'products.buying_price','products.selling_price',
                'products.product_description',
                DB::raw('category_details.cat_product as cat, brands.name as barnd'),
                DB::raw("(GROUP_CONCAT(product_images.image SEPARATOR '@')) as `image`") )
            ->groupBy('products.id')
            ->where('products.name','LIKE',"%{$search}%")
            ->get();
            // dd($products);
            return $products;
    }
}
