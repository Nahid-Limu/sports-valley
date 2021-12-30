<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\CategoryDetails;
use App\BusinessCategory;
use App\Product;
use App\Brand;
use App\ProductImage;
use App\Invoice;
use App\Profite;
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

        //    dd($output);
        return view('admin.sales.salesView', compact('products'));
    }

    public function sealProductDetails($id)
    {
        // dd(121);
        // $Product = Product::find($id);dd($Product);
        $sealproduct = DB::table('products')
            ->join('category_details', 'products.cd_id', '=', 'category_details.id')
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->join('product_images', 'products.id', '=', 'product_images.p_id')
            ->select('products.id','products.code','products.name','products.quantity',
                'products.buying_price','products.selling_price',
                
                
                'product_images.image',
                // DB::raw("(GROUP_CONCAT(product_images.image SEPARATOR '@')) as `image`") 
                )
            // ->groupBy('products.id')
            ->where('products.id',$id)
            ->first();
            // dd($sealproduct);
        return response()->json($sealproduct);
    }

    public function printInvoice(Request $request)
    {
        // dd($request->all());
        $invoice_id = Invoice::count() + 1;
        $pIds = explode(",", $request->pIds);
        $pQuantity = explode(",", $request->pQuantity);
        // dd($pQuantity);

        //---Update Quantity and Insert Invoice---//
            foreach ($pIds as $key => $pid) {
                // dd( (int)$pQuantity[$key] );
                $Product = Product::find($pid);
                //---Update Product Quantity---//
                    $Product->quantity = ($Product->quantity)- ( (int)$pQuantity[$key] );
                    $Product->save();
                //---Update Product Quantity---//
               
                //---insert Invoice data---//
                    $Invoice = new Invoice;
                    $Invoice->invoice_id = "#INVOICE-".$invoice_id;
                    $Invoice->buyer_name = $request->bnameinp;
                    $Invoice->buyer_address = $request->baddressinp;
                    $Invoice->p_code = $Product->code;
                    $Invoice->p_quantity = $pQuantity[$key];
                    $Invoice->save();
                //---insert Invoice data---//
            }
        //---Update Quantity and Insert Invoice---//

        //---insert Profite data---//
            $Profite = new Profite;
            $Profite->invoice_id = "#INVOICE-".$invoice_id;
            $Profite->buying_price = (int)$request->buyingPrice;
            $Profite->selling_price = (int)$request->saleingPrice;
            $Profite->discount_amount = (int)$request->lessAmount;
            $Profite->profite = ( (int)$request->saleingPrice ) - ( (int)$request->buyingPrice + (int)$request->lessAmount );
            $Profite->save();
        //---insert Profite data---//
        
        // dd('okk');
        // return response()->json($invoice_id);
        return response()->json( ['InvoiceID' => "#INVOICE-".$invoice_id] );

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
