<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\CategoryDetails;
use App\BusinessCategory;
use Auth;
use DB;
use Intervention\Image\Facades\Image as Image;

class CategoryController extends Controller
{
    public function categorySettings()
    {
        $CategoryDetails = DB::table('category_details')
            ->join('business_categories', 'category_details.bc_id', '=', 'business_categories.id')
            
            ->select('category_details.id','business_categories.cat_name','category_details.cat_product','category_details.image')
            ->get();
            // dd($CategoryDetails);
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
        $Business = BusinessCategory::all(['id','cat_name']);
        // dd($BusinessCategory);
        return view('admin.category.categorieSettings', compact('Business'));
    }

    public function addCategory(Request $request)
    {
        if ($request->hasFile('image')) {
            // dd($request->all());
            $CategoryDetails = new CategoryDetails;

            $CategoryDetails->bc_id = $request->business_cat;
            $CategoryDetails->cat_product = strtoupper($request->product_name);

                $image = $request->file('image');

                $filename = time().'-'.$image->getClientOriginalName();
                $path = public_path('category_product_img/' . $filename);
                Image::make($image->getRealPath())->resize(200, 200)->save($path);

            $CategoryDetails->image =$filename;
            $CategoryDetails->save();

            if ($CategoryDetails->id) {
                return response()->json(['success' => 'Category Product Added successfully.']);
            } else {
                return response()->json(['failed' => 'Category Product Added failed.']);
            }


        }
    }

    public function editCategory($id)
    {
        $CategoryDetails = DB::table('category_details')
            ->join('business_categories', 'category_details.bc_id', '=', 'business_categories.id')
            
            ->select('category_details.id','business_categories.cat_name','category_details.cat_product','category_details.image',DB::raw('business_categories.id AS bid'))
            ->where('category_details.id', $id)
            ->first();
            return response()->json($CategoryDetails);
    }

    public function updateCategory(Request $request)
    {
        // dd($request->all());
        if ($request->hasFile('eimage')) {

            $CategoryDetails = CategoryDetails::find($request->id);
            
            $image=$CategoryDetails->image;

            if($image!=null){
                $path = public_path() . "/category_product_img/" . $image;
                if (file_exists($path)) {
                    unlink($path);
                }
            }
            

            // $Brand = new Brand;
            $CategoryDetails->bc_id = $request->ebusiness_cat;
            $CategoryDetails->cat_product = strtoupper($request->eproduct_name);

                $image = $request->file('eimage');

                $filename = time().'-'.$image->getClientOriginalName();
                $path = public_path('category_product_img/' . $filename);
                Image::make($image->getRealPath())->resize(200, 200)->save($path);

            $CategoryDetails->image =$filename;
            $CategoryDetails->save();

            if ($CategoryDetails->id) {
                return response()->json(['success' => 'Category Details Update successfully.']);
            } else {
                return response()->json(['failed' => 'Category Details Update failed.']);
            }


        }else {
            $CategoryDetails = CategoryDetails::find($request->id);
            $CategoryDetails->bc_id = $request->ebusiness_cat;
            $CategoryDetails->cat_product = strtoupper($request->eproduct_name);
            $CategoryDetails->save();

            if ($CategoryDetails->id) {
                return response()->json(['success' => 'Category Details Update successfully.']);
            } else {
                return response()->json(['failed' => 'Category Details Update failed.']);
            }

        }
    }

    public function deleteCategory($id)
    {
        
        $CategoryDetails = CategoryDetails::find($id);
        $image=$CategoryDetails->image;

        if($image!=null){
            $path = public_path() . "/category_product_img/" . $image;
            if (file_exists($path)) {
                unlink($path);
            }
        }
        
        if ($CategoryDetails) {
            $CategoryDetails->delete();
            return response()->json(['success' => 'Category Product Delete Successfully....!!!']);
        } else {
            return response()->json(['failed' => 'Category Product Delete failed.']);
        }

    }
}
