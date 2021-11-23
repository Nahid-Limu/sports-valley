<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\BusinessCategory;
use Auth;
use DB;
use Intervention\Image\Facades\Image as Image;

class BusinessController extends Controller
{

    public function businessSettings()
    {
        $Business = BusinessCategory::all(['id','cat_name','image','show_status']);
        // dd($Business);

        if(request()->ajax())
        {
            return datatables()->of($Business)
                    

                    ->addColumn('image', function($data){
                        $url= asset('system_img').'/'.$data->image; 
                        $button = " <div class='text-center'>
                                        <img src='$url' class='img-fluid' style='widows: 40px; height: 40px;'>
                                    </div>  ";
                        // $button .= '&nbsp;&nbsp;';
                        return $button;   
                    })

                    ->addColumn('show_status', function($data){
                        if ($data->show_status == 1) {
                            $button = "<kbd class='bg-success'>Show In Home</kbd>";
                        }else {
                            $button = "<kbd class='bg-danger'>Hide In Home</kbd>";
                        }
                        
                        // $button .= '&nbsp;&nbsp;';
                        return $button;   
                    })

                    ->addColumn('action', function($data){
                        $button = '<div class="d-flex justify-content-center"><button type="button" onclick="editBusinessCategory('.$data->id.')" name="edit" id="'.$data->id.'" class="edit btn btn-sm d-flex justify-content-center" data-toggle="modal" data-target="#EditBusinessCategoryModal" data-placement="top" title="Edit"><i class="fa fa-edit" style="color: aqua"> Edit</i></button>';
                        $button .= '<button type="button" onclick="deleteModal('.$data->id.',\''.$data->cat_name.'\')" name="delete" id="'.$data->id.'" class="delete btn btn-sm" data-toggle="modal" data-target="#DeleteConfirmationModal" data-placement="top" title="Delete"  style="color: red"><i class="fa fa-trash"> Delete</i></button></div>';
                        
                        return $button;
                    })
                    ->rawColumns(['image','action','show_status'])
                    ->addIndexColumn()
                    ->make(true);
        }
        return view('admin.business.businessSettings');
    }

    public function addBusinessCat(Request $request)
    {
        if ($request->hasFile('image')) {
            // dd($request->all());
            $Business = new BusinessCategory;

            $Business->cat_name = ucwords($request->categorie_name);

                $image = $request->file('image');
                $filename = time().'-'.$request->categorie_name.'.'.$image->getClientOriginalExtension();
                // $filename = time().'-'.$image->getClientOriginalName();
                $path = public_path('system_img/' . $filename);
                Image::make($image->getRealPath())->resize(300, 300)->save($path);

            $Business->image =$filename;
            $Business->save();

            if ($Business->id) {
                return response()->json(['success' => 'Category Added successfully.']);
            } else {
                return response()->json(['failed' => 'Category Added failed.']);
            }


        }
    }

    public function editBusinessCat($id)
    {
        $Business = BusinessCategory::find($id);
        return response()->json($Business);
    }

    public function updateBusinessCat(Request $request)
    {
        // dd($request->all());
        $Business = BusinessCategory::find($request->id);
        $Business->cat_name = $request->cat_name;

        if (is_null($request->eshow_status)) {
            $Business->show_status = 0;
        } else {
            $Business->show_status = 1;
        }
        
        $Business->save();
    
        if ($Business->id) {
            return response()->json(['success' => 'Category Info Update successfully !!!']);
        } else {
            return response()->json(['falied' => 'Category Info Update Nothing.']);
        }
    }

    public function deleteCat($id)
    {
        $Business = BusinessCategory::find($id);
        $image=$Business->image;

        if($image!=null){
            $path = public_path() . "/system_img/" . $image;
            if (file_exists($path)) {
                unlink($path);
            }
        }
        
        if ($Business) {
            $Business->delete();
            return response()->json(['success' => 'Category Delete successfully !!!']);
        } else {
            return response()->json(['falied' => 'Category Delete falied !!!']);
        }
    }
}
