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
        $products = DB::table('products')
            ->join('category_details', 'products.cd_id', '=', 'category_details.id')
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->join('product_images', 'products.id', '=', 'product_images.p_id')
            ->select('products.id','products.code','products.name','products.quantity',
                
                DB::raw('brands.name as barnd'),
                'products.buying_price','products.selling_price',
                DB::raw("(GROUP_CONCAT(product_images.image SEPARATOR '@')) as `image`") )
            ->groupBy('products.id')
            ->get();
            // $img = explode("@",$products[0]->image);
            // dd($img[0]);
        // $CategoryDetails = CategoryDetails::all(['id','cat_product','image']);

        // if(request()->ajax())
        // {
        //     return datatables()->of($products)


        //             ->addColumn('image', function($data){

        //                     $img = explode("@",$data->image);
        //                     $button = " <div class='text-center'>";
        //                         foreach ($img as $key => $value) {
                                    
        //                             $url= asset('product_img').'/'.$value;
        //                             $button .= " <img src='$url' style='widows: 40px; height: 40px; margin-bottom: 10px;'> </br> ";
        //                         }
        //                     $button .= "</div>";
                        
        //                 // $button .= '&nbsp;&nbsp;';
        //                 return $button;   
        //             })
                    
        //             ->addColumn('action', function($data){
        //                 $button = '<div class="d-flex justify-content-center"><button type="button" onclick="editBusinessCategory('.$data->id.')" name="edit" id="'.$data->id.'" class="edit btn btn-sm d-flex justify-content-center" data-toggle="modal" data-target="#EditBusinessCategoryModal" data-placement="top" title="Edit"><i class="fa fa-edit" style="color: aqua"> Edit</i></button>';
        //                 $button .= '<button type="button" onclick="deleteModal('.$data->id.',\''.$data->name.'\')" name="delete" id="'.$data->id.'" class="delete btn btn-sm" data-toggle="modal" data-target="#DeleteConfirmationModal" data-placement="top" title="Delete"  style="color: red"><i class="fa fa-trash"> Delete</i></button></div>';
                        
        //                 return $button;
        //             })
        //             ->rawColumns(['image','action'])
        //             ->addIndexColumn()
        //             ->make(true);
        // }
        // dd( $products);

        // $no = $request->i - 1;
        // $test = Test::find($request->data);
        // $no;
        $output = '';
        foreach ($products as $key => $product) {
            $output .= '<tr id=test'.$product->id.'>
       
            <td>'.$product->code.'</td>
            <td>'.$product->name.'</td>
            <td class ="price">'.$product->quantity.'</td>
            <td class ="testaction" onclick="removeRow(\'test\'+'.$product->id.')"><i class="fa fa-remove" style="font-size:24px; color:red;"></i></td>';
            
            $output .='</tr>';
        }

    //    dd($output);
        return view('admin.sales.salesView', compact('output','products'));
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
                    ->where('products.code','LIKE',"%{$search}%")
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

    public function test()
    {
        $latestProduct = Product::all();
        // $pCode = (empty($latestProduct)) ? '#'.str_pad(0 + 1, 8, "0", STR_PAD_LEFT) : '#'.str_pad($latestProduct->id + 1, 8, "0", STR_PAD_LEFT) ;
        foreach ($latestProduct as $key => $value) {
            $pCode = (empty($value)) ? '#'.str_pad(0 + 1, 8, "0", STR_PAD_LEFT) : '#'.str_pad($value->id + 0, 8, "0", STR_PAD_LEFT) ;
            // dd($value);
            $product = Product::find($value->id);
            $product->code = $pCode; 
            $product->save();
            // dd($product);
        }
         dd(121);
    }
}
