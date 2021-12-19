<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\CategoryDetails;
use App\BusinessCategory;
use App\Brand;
use App\Product;
use Auth;
use DB;

class UserController extends Controller
{
    public function home()
    {
        $Business = BusinessCategory::get(['id','cat_name','image','show_status']);
        $Brands = Brand::get(['id','name','image']);

        $showDatas = DB::table('category_details')
            ->join('business_categories', 'business_categories.id', '=', 'category_details.bc_id')
            
                ->select(DB::raw("
                    category_details.id,
                    category_details.bc_id,
                    category_details.cat_product,
                    business_categories.cat_name,
                    category_details.image,

                    CASE
                        WHEN ( (SELECT SUM(products.quantity) FROM products WHERE products.cd_id = category_details.id ) ) > 0 THEN ( (SELECT SUM(products.quantity) FROM products WHERE products.cd_id = category_details.id ) )
                        ELSE 0
                    END 
                    AS quantity

                    ")
                )
            ->where('business_categories.show_status', 1)
            // ->where('business_categories.id', '=', )
            // ->limit(4)
            ->inRandomOrder()
            ->get();
            // dd($showDatas);


        $mainArray = array(); 
        foreach ($Business as $key => $value) {
            // dd($value->cat_name);
            $newArray = array();
            foreach ($showDatas as $k => $val) {
                
                // dd($val->bc_id);
                if ($value->id == $val->bc_id) {
                    // array_push( $newArray,  $val );
                    $newArray[] = $val;
                    // $mainArray[$value->cat_name] = $val;
                }
                continue;
               
            }
            // $mainArray[$value->cat_name] = $newArray;
            $mainArray[$value->id] = $newArray;
        }

        // dd($mainArray);
        return view('homePage', compact('Business','Brands','mainArray'));
        // return view('homePage', compact('Business','Brands','sports_accessories','sports_wear','mainArray'));
    }


    public function categoryDetails($id)
    {
        $bc_id = (base64_decode($id));

        $cat_details = CategoryDetails::where('bc_id', $bc_id)->paginate(6);

        $Brands = Brand::get(['id','name','image']);
        // dd($cat_details);
        return view('catDetails', compact('cat_details','Brands'));
    }

    public function allProducts($id)
    {
        $id = (base64_decode($id));
        // dd($id);
        $products = DB::table('products')
            ->join('category_details', 'products.cd_id', '=', 'category_details.id')
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->join('product_images', 'products.id', '=', 'product_images.p_id')
            ->select('products.id','products.code','products.name','products.quantity',
                'products.buying_price','products.selling_price',
                'products.product_description',
                DB::raw('category_details.cat_product as cat, brands.name as barnd'),
                // DB::raw("(GROUP_CONCAT(product_images.image SEPARATOR '@')) as `image`") ,
                DB::raw('product_images.image as image'),
                'products.created_at'
                )
            ->groupBy('products.id')
            ->where('products.cd_id',$id)
            ->paginate(12);
            // ->get();
            // dd($products);

            $Brands = Brand::get(['id','name','image']);
        return view('allProduct', compact('products', 'Brands'));
    }

    public function productDetails($id)
    {
        $id = (base64_decode($id));
        $product = DB::table('products')
            ->join('category_details', 'products.cd_id', '=', 'category_details.id')
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->join('product_images', 'products.id', '=', 'product_images.p_id')
            ->select('products.id','products.code','products.name','products.quantity',
                'products.buying_price','products.selling_price',
                'products.product_description',
                DB::raw('category_details.cat_product as cat, brands.name as barnd'),
                DB::raw("(GROUP_CONCAT(product_images.image SEPARATOR '@')) as `image`") )
            ->groupBy('products.id')
            ->where('products.id', $id)
            ->first();

        $images = explode("@",$product->image);
        // dd($images[0]);
        return view('productDetails', compact('product','images'));
    }

    public function about()
    {
        return view('about');
    }
}
