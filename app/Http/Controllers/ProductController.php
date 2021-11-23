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
            ->join('product_images', 'products.id', '=', 'product_images.p_id')
            ->select('products.id','products.name','products.quantity',
                'products.buying_price','products.selling_price',
                'products.product_description',
                DB::raw('category_details.cat_product as cat, brands.name as barnd'),
                DB::raw("(GROUP_CONCAT(product_images.image SEPARATOR '@')) as `image`") )
            ->groupBy('products.id')
            ->get();
            // dd($products);
        // $CategoryDetails = CategoryDetails::all(['id','cat_product','image']);

        if(request()->ajax())
        {
            return datatables()->of($products)


                    ->addColumn('image', function($data){

                            $img = explode("@",$data->image);
                            $button = " <div class='text-center'>";
                                foreach ($img as $key => $value) {
                                    
                                    $url= asset('product_img').'/'.$value;
                                    $button .= " <img src='$url' style='widows: 40px; height: 40px; margin-bottom: 10px;'> </br> ";
                                }
                            $button .= "</div>";
                        
                        // $button .= '&nbsp;&nbsp;';
                        return $button;   
                    })
                    
                    ->addColumn('action', function($data){
                        $button = '<div class="d-flex justify-content-center"><button type="button" onclick="editBusinessCategory('.$data->id.')" name="edit" id="'.$data->id.'" class="edit btn btn-sm d-flex justify-content-center" data-toggle="modal" data-target="#EditBusinessCategoryModal" data-placement="top" title="Edit"><i class="fa fa-edit" style="color: aqua"> Edit</i></button>';
                        $button .= '<button type="button" onclick="deleteModal('.$data->id.',\''.$data->name.'\')" name="delete" id="'.$data->id.'" class="delete btn btn-sm" data-toggle="modal" data-target="#DeleteConfirmationModal" data-placement="top" title="Delete"  style="color: red"><i class="fa fa-trash"> Delete</i></button></div>';
                        
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
            
            // $filename = time().'-'.$image->getClientOriginalName();
            // $path = public_path('images/' . $filename);
            // Image::make($image->getRealPath())->resize(100, 90)->save($path);

            // product images insert start
            $now = Carbon::now('utc')->toDateTimeString();

            foreach($request->file('image') as $key => $image)
            {
                $filename = time().'-'.$request->product_name.$key.'.'.$image->getClientOriginalExtension();
                // $image->move(public_path().'/product_img/', $filename);  

                $path = public_path('product_img/' . $filename);
                Image::make($image->getRealPath())->resize(730, 360)->orientate()->save($path);

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

    public function deleteProduct($id)
    {
        // dd($id);
        $Product = Product::find($id);
        $ProductImage = ProductImage::select("image")->where("p_id", $id)->get();
        // dd($ProductImage);
        
        //delete image from storage start
        foreach ($ProductImage as $key => $value) {
            $image=$value->image;
            // echo $image.'</br>';
            if($image!=null){
                $path = public_path() . "/product_img/" . $image;
                if (file_exists($path)) {
                    unlink($path);
                }
            }
        }
        //delete image from storage ens
        
        if ($Product) {
            ProductImage::where("p_id", $id)->delete();
            $Product->delete();
            return response()->json(['success' => 'Product Delete Successfully....!!!']);
        } else {
            return response()->json(['failed' => 'Product Delete failed.']);
        }

    }
}
