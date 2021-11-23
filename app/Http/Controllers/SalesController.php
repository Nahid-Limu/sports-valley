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
        
        if ($request->search) {
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
                        // DB::raw("(GROUP_CONCAT(product_images.image SEPARATOR '@')) as `image`"),
                        DB::raw('product_images.image as image') )
                    ->groupBy('products.id')
                    ->where('products.name','LIKE',"%{$search}%")
                    ->get();
                    // dd($products);                    

                    // $output;
                    // foreach ($products as $product) {
                    //     // dd($product->image);
                    //     $url= asset('product_img').'/'.$product->image;
                    //     // $button .= " <img src='$url' style='widows: 40px; height: 40px; margin-bottom: 10px;'> </br> ";
                    //         $output=
                    //         '<div class="col-lg-3 mb-4 text-center">
                    //             <div class="product-entry border">
                    //                 <img src="'.$url.'" class="img-fluid fixed-img-size product_img">
                    //                 <div class="desc">
                    //                     <h2 class="text-uppercase"><a href="#">' .$product->name. '</a></h2>
                    //                     <span class="price"><kbd>Price:</kbd> ' .$product->selling_price. ' Tk</span>
                    //                     <button class="btn btn-sm btn-info">Buy</button>
                            
                    //                 </div> 
                    //             </div> 
                    //         </div>';
                    // }
                    
                    $output = '<ul class="plistul">';
                    foreach ($products as $product) {
                        $output .='<li class="plistli" id='.$product->id.'>'.$product->name.'</li>';
                    }
                    $output .='</ul>';

                //    dd($output);
                    // if (count($products)>0) {
                    //     // return $output;
                    //     return response()->json([
                    //         'output' => $output
                    //     ]);
                    // } else {
                    //     // return  $output = 0;
                    //     return response()->json([$output=0]);
                        
                    //     // return  $output = '<ul><li style=" color:red;">No Data Found or Already Used</li></ul>';
                    // }
                    if (count($products)>0) {
                        // dd(1);
                        return response()->json( $output);
                    } else {
                        // dd(0);
                        return response()->json( $output=0);
                        // return  $output = '<ul><li style=" color:red;">No Data Found or Already Used</li></ul>';
                    }
        }
        
    }
}
