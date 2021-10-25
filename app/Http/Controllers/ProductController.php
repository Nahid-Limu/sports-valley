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

class ProductController extends Controller
{
    public function productSettings()
    {
        $products = DB::table('products')
            ->join('category_details', 'products.cd_id', '=', 'category_details.id')
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->select('products.id','products.name','products.quantity','products.buying_price','products.selling_price','products.product_description',DB::raw('category_details.cat_product as cat, brands.name as barnd'))
            ->get();
            // dd($products);
        // $CategoryDetails = CategoryDetails::all(['id','cat_product','image']);

        if(request()->ajax())
        {
            return datatables()->of($CategoryDetails)


                    ->addColumn('image', function($data){
                        $url= asset('category_product_img').'/'.$data->image; 
                        $button = " <div class='text-center'>
                                        <img src='$url' class='img-fluid' style='widows: 40px; height: 40px;'>
                                    </div>  ";
                        // $button .= '&nbsp;&nbsp;';
                        return $button;   
                    })
                    
                    ->addColumn('action', function($data){
                        $button = '<div class="d-flex justify-content-center"><button type="button" onclick="editBusinessCategory('.$data->id.')" name="edit" id="'.$data->id.'" class="edit btn btn-sm d-flex justify-content-center" data-toggle="modal" data-target="#EditBusinessCategoryModal" data-placement="top" title="Edit"><i class="fa fa-edit" style="color: aqua"> Edit</i></button>';
                        $button .= '<button type="button" onclick="deleteModal('.$data->id.',\''.$data->cat_product.'\')" name="delete" id="'.$data->id.'" class="delete btn btn-sm" data-toggle="modal" data-target="#DeleteConfirmationModal" data-placement="top" title="Delete"  style="color: red"><i class="fa fa-trash"> Delete</i></button></div>';
                        
                        return $button;
                    })
                    ->rawColumns(['image','action'])
                    ->addIndexColumn()
                    ->make(true);
        }
        $Category = CategoryDetails::all(['id','cat_product']);
        $Brand = Brand::all(['id','name']);
        // dd($BusinessCategory);
        return view('admin.product.productSettings', compact('Category','Brand'));
    }

    public function addProduct(Request $request)
    {

        // $now = Carbon::now('utc')->toDateTimeString();
        // dd($now );
        // dd($request->all());
        if ($request->hasFile('image')) {

            $Product = new Product;
            $Product->cd_id = $request->cd_name;
            $Product->brand_id = $request->brand_name;
            $Product->name = $request->product_name;
            $Product->quantity = $request->quantity;
            $Product->buying_price = $request->buying_price;
            $Product->selling_price = $request->selling_price;
            $Product->product_description = $request->product_description;
            $Product->save();
            
            
            // product images insert start
            $now = Carbon::now('utc')->toDateTimeString();

            foreach($request->file('image') as $image)
            {
                $filename = time().'-'.$request->product_name.'.'.$image->getClientOriginalExtension();
                $image->move(public_path().'/product_img/', $filename);  
                
                $data[] = [
                    'p_id' => $Product->id,
                    'image' => $filename,
                    'created_at'=> $now,
                    'updated_at'=> $now
                ]; 
            }
            ProductImage::insert($data);
            // product images insert end

            if ($Product->id) {
                // dd('okk');
                return response()->json(['success' => 'Product Added successfully.']);
            } else {
                // dd('ops');
                return response()->json(['failed' => 'Product Added failed.']);
            }

        }else {
            return response()->json(['failed' => 'Plese uplode Image.']);
        }
    }
}
