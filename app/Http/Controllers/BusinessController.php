<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\BusinessCategory;
use Auth;
use DB;

class BusinessController extends Controller
{

    public function businessSettings()
    {
        $Business = BusinessCategory::all(['id','cat_name']);

        if(request()->ajax())
        {
            return datatables()->of($Business)
                    
                    ->addColumn('action', function($data){
                        $button = '<div class="d-flex justify-content-center"><button type="button" onclick="editBusinessCategory('.$data->id.')" name="edit" id="'.$data->id.'" class="edit btn btn-sm d-flex justify-content-center" data-toggle="modal" data-target="#EditBusinessCategoryModal" data-placement="top" title="Edit"><i class="fa fa-edit" style="color: aqua"> Edit</i></button>';
                        $button .= '<button type="button" onclick="deleteModal('.$data->id.',\''.$data->cat_name.'\')" name="delete" id="'.$data->id.'" class="delete btn btn-sm" data-toggle="modal" data-target="#DeleteConfirmationModal" data-placement="top" title="Delete"  style="color: red"><i class="fa fa-trash"> Delete</i></button></div>';
                        
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->addIndexColumn()
                    ->make(true);
        }
        return view('admin.businessSettings');
    }

    public function addBusinessCat(Request $request)
    {

        $Business = new BusinessCategory;
        $Business->cat_name = $request->categorie_name;
        $Business->save();

        if ($Business->id) {
            return response()->json(['success' => 'Category Added successfully.']);
        } else {
            return response()->json(['failed' => 'Category Added failed.']);
        }
    }

    public function editBusinessCat($id)
    {
        $Business = BusinessCategory::find($id);
        return response()->json($Business);
    }

    public function updateBusinessCat(Request $request)
    {
        $Business = BusinessCategory::find($request->id);
        $Business->cat_name = $request->cat_name;
        $Business->save();
    
        if ($Business->id) {
            return response()->json(['success' => 'Category Info Update successfully !!!']);
        } else {
            return response()->json(['falied' => 'Category Info Update Nothing.']);
        }
    }

    public function deleteCat($id)
    {
        $Business = BusinessCategory::find($id)->delete();
        // $flight->delete();
        if ($Business) {
            return response()->json(['success' => 'Category Delete successfully !!!']);
        } else {
            return response()->json(['falied' => 'Category Delete falied !!!']);
        }
    }
}
