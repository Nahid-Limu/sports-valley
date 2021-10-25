<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Brand;
use Auth;
use DB;
use Intervention\Image\Facades\Image as Image;

class BrandController extends Controller
{
    public function brandSettings()
    {
        $Brand = Brand::all(['id','name','image']);

        if(request()->ajax())
        {
            return datatables()->of($Brand)

                    ->addColumn('image', function($data){
                        $url= asset('images').'/'.$data->image; 
                        $button = " <div class='text-center'>
                                        <img src='$url' class='img-fluid' style='widows: 40px; height: 40px;'>
                                    </div>  ";
                        // $button .= '&nbsp;&nbsp;';
                        return $button;   
                    })
                    
                    ->addColumn('action', function($data){
                        $button = '<div class="d-flex justify-content-center"><button type="button" onclick="editBrand('.$data->id.')" name="edit" id="'.$data->id.'" class="edit btn btn-sm d-flex justify-content-center" data-toggle="modal" data-target="#EditBrandModal" data-placement="top" title="Edit"><i class="fa fa-edit" style="color: aqua"> Edit</i></button>';
                        $button .= '<button type="button" onclick="deleteModal('.$data->id.',\''.$data->name.'\')" name="delete" id="'.$data->id.'" class="delete btn btn-sm" data-toggle="modal" data-target="#DeleteConfirmationModal" data-placement="top" title="Delete"  style="color: red"><i class="fa fa-trash"> Delete</i></button></div>';
                        
                        return $button;
                    })
                    ->rawColumns(['image','action'])
                    ->addIndexColumn()
                    ->make(true);
        }
        return view('admin.brands.brandsSettings');
    }

    public function addBrand(Request $request)
    {
        $Brand = Brand::all()->count();
        if (empty($Brand)) {
           
            $Brand = new Brand;
            $Brand->id = 99;
            $Brand->name = strtoupper('Non Brand');
            $Brand->save();
            
        }

        if ($request->hasFile('image')) {
            // dd($request->all());
            $Brand = new Brand;

            $Brand->name = strtoupper($request->brand_name);

                $image = $request->file('image');

                $filename = time().'-'.$image->getClientOriginalName();
                $path = public_path('images/' . $filename);
                Image::make($image->getRealPath())->resize(300, 200)->save($path);

            $Brand->image =$filename;
            $Brand->save();

            if ($Brand->id) {
                return response()->json(['success' => 'Brand Added successfully.']);
            } else {
                return response()->json(['failed' => 'Brand Added failed.']);
            }


        }
    }

    public function editBrand($id)
    {
        $Brand = Brand::find($id);
        return response()->json($Brand);
    }

    public function updateBrand(Request $request)
    {

        if ($request->hasFile('eimage')) {

            $Brand = Brand::find($request->id);
            
            $image=$Brand->image;

            if($image!=null){
                $path = public_path() . "/images/" . $image;
                if (file_exists($path)) {
                    unlink($path);
                }
            }
            

            // $Brand = new Brand;
            $Brand->name = strtoupper($request->ebrand_name);

                $image = $request->file('eimage');

                $filename = time().'-'.$image->getClientOriginalName();
                $path = public_path('images/' . $filename);
                Image::make($image->getRealPath())->resize(300, 200)->save($path);

            $Brand->image =$filename;
            $Brand->save();

            if ($Brand->id) {
                return response()->json(['success' => 'Brand Update successfully.']);
            } else {
                return response()->json(['failed' => 'Brand Update failed.']);
            }


        }else {
            $Brand = Brand::find($request->id);
            $Brand->name = strtoupper($request->ebrand_name);
            $Brand->save();

            if ($Brand->id) {
                return response()->json(['success' => 'Brand Update successfully.']);
            } else {
                return response()->json(['failed' => 'Brand Update failed.']);
            }

        }
    }

    public function deleteBrand($id)
    {
        
        $Brand = Brand::find($id);
        $image=$Brand->image;

        if($image!=null){
            $path = public_path() . "/images/" . $image;
            if (file_exists($path)) {
                unlink($path);
            }
        }
        
        if ($Brand) {
            $Brand->delete();
            return response()->json(['success' => 'Brand Delete Successfully....!!!']);
        } else {
            return response()->json(['failed' => 'Brand Delete failed.']);
        }

    }
}
